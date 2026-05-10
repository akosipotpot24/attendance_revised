<?php

namespace App\Http\Controllers;

use App\Events\AuditTrails;
use App\Events\StudentUpdated;
use App\Models\ActivityLog;
use App\Models\Attendance;
use App\Models\AuditTrail;
use App\Models\Section;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class CrudController extends Controller
{
    
    //
    public function libraryVisits()
    {
        $visits = Attendance::all();
        return view('crud/library_visits', compact('visits'));
    }


    public function scan($student_number)
{
    $student = Student::where('student_number', $student_number)->first();

    if ($student) {
      
        $today = now()->toDateString();

      
        $lastAttendance = Attendance::where('student_number', $student_number)
            ->whereDate('attendance_date', $today)
            ->orderBy('attendance_date', 'desc')
            ->first();

        
        $punchType = 'in'; 
        if ($lastAttendance && $lastAttendance->status === 'in') {
            $punchType = 'out';
        }

        
        Attendance::create([
            'student_number' => $student->student_number,
            'student_name' => $student->firstname . ' ' . $student->middlename . ' ' . $student->lastname,
            'library_location' => $student->library_branch,
            'grade_level' => $student->section,
            'attendance_date' => now(),
            'status' => $punchType
        ]);

        return response()->json([
            'success' => true,
            'punch_type' => $punchType,
            'student_number' => $student->student_number,
            'fullname' => $student->firstname . ' ' . $student->lastname,
            'firstname' => $student->firstname,
            'middlename' => $student->middlename,
            'lastname' => $student->lastname,
            'section' => $student->section,
            'role' => $student->school_role,
            'avatar' => $student->avatar
        ]);
    }

    return response()->json([
        'success' => false
    ]);
}

  
    public function destroy($student_number){
        Student::where('student_number', $student_number)->delete();
        return redirect('/viewStudents')->with('success', 'Student deleted successfully!');
    }

    public function update(Request $req, $student_number){
        $values=$req->validate([
            'firstname' => 'required',
            'middlename' => '',
            'lastname' => 'required',
            'school_role' => 'required',
            'library_branch' => 'required',
            'section' => 'required',
            'student_number' => 'required',
            'avatar' => 'image|max:8000|nullable'
        ]);

  
      if ($req->hasFile('avatar')) {

        $filename = $values['student_number'] . uniqid() . ".jpg";
        $oldavatar = Student::where('student_number', $student_number)->value('avatar');
        $manager = new ImageManager(new Driver());
        $image = $manager->read($req->file("avatar"));
        $imgData = $image->cover(400, 400)->toJpg();
        Storage::disk('public')->put('avatars/' . $filename, $imgData);
        $values['avatar'] = $filename;

         if ($oldavatar && $oldavatar !== 'default.png') {
            Storage::disk('public')->delete('avatars/' . $oldavatar);
        }
    }
        
        // Student::where('student_number', $student_number)->update($values);
        $student = Student::where('student_number', $student_number)->first();  
        $original = $student->getOriginal();
        $student->update($values);
        $changes = [];

        foreach ($values as $field => $newValue) {
            if (isset($original[$field]) && $original[$field] != $newValue) {
                $changes[$field] = [
                    'old' => $original[$field],
                    'new' => $newValue
                ];
            }
        }

        event(new StudentUpdated($student, auth()->user() ,$changes));

        return redirect('/crud/edit/' . $student_number)->with('success', 'Student updated successfully!');
    }

     public function logout(){
        event(new AuditTrails(
            auth()->user()->id,
            'User has attempted to log out with username: '.auth()->user()->username,
            'authentication: Logged out successfully',
            'User logged out'
        ));
        auth()->logout();
        return redirect('/')->with('logout', 'You are Logged Out');
    }

    public function login(Request $req, User $user){

    $values= $req->validate([
        'username' => 'required',
        'password' => 'required'
    ]);
    
    $user = User::where('username', $values['username'])
                    ->where('status', '1')
                    ->whereIn('user_type', [1, 2, 3, 4])->first();
    if (!$user){
       event(new AuditTrails(
            $values['username'],
            'Login failed: user not approved or invalid role',
            'authentication: Failed login attempt',
            'User login'
        ));

        return back()->with('failed', 'Invalid user, Please wait for approval or contact administrator');
    } //$user
    

     if (auth()->attempt([
         'username' => $values['username'],
         'password' => $values['password']
     ])){

         $req->session()->regenerate();
         event(new AuditTrails(
             auth()->user()->id,
             'User( '.auth()->user()->fullname.' ) attempt logged in',
             'authentication: Successfully logged in',
             'User logged in'
         ));
         
        if (auth()->user()->user_type == 4){
            return redirect('/scan');
        }

         return redirect('/welcome');
     }
     else{
         event(new AuditTrails(
             $values['username'],
             'User has attempted to log in with username: '.$values['username'],
             'authentication: Failed login attempt',
             'User logged in'
         ));
         return back()->with(['failed' => 'Invalid username or password']);
         }
    }



    public function userRegister(Request $req){
        $values= $req->validate([
            'username' => 'required',
            'fullname' => 'required',
            'email' => 'required|email',
            'user_type' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);
        $values['password'] = bcrypt($values['password']);
        if($values['user_type'] == 4){
          $values['user_type'] = 4;
          $values['status'] = 0;
          User::create($values);

        return redirect('/')->with('success', 'User registered successfully! Please wait for administrator approval.');
        }
        else{
          $values['user_type'] = 0;
          $values['status'] = 0;
          User::create($values);

        return redirect('/')->with('success', 'User registered successfully! Please wait for administrator approval.');
        }
    }


    public function register(Request $req){
        $values= $req->validate([ 
            'firstname' => 'required',
            'middlename' => '',
            'lastname' => 'required',
            'school_role' => 'required',
            'library_branch' => 'required',
            'section' => 'required',
            'student_number' => 'required'

        ]);

        Student::create($values);

        return redirect('/viewStudents');

    }

    public function viewstudents(){
       $students = Student::all();
        return view('crud/dashboard' ,compact('students'));
    }
    public function records(){
       $records = ActivityLog::all();
       $auditTrails = AuditTrail::all();
        return view('crud/AuditTrails' ,compact('records','auditTrails'));
    }

    public function edit($student){
        $student = Student::where('student_number', $student)->first();
        $sections = Section::all();
        return view('crud/edit', compact('student','sections'));
    }

    public function newUser(){
        $sections = Section::all();
        return view('crud/register', compact ('sections'));
    }

}
