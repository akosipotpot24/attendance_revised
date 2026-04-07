<?php

namespace App\Http\Controllers;

use App\Events\AuditTrails;
use App\Events\StudentUpdated;
use App\Models\ActivityLog;
use App\Models\Attendance;
use App\Models\AuditTrail;
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
    public function scan($student_number)
{
    $student =Student::where('student_number', $student_number)->first();

    if ($student) {
            Attendance::create([
            'student_number'=> $student->student_number,
            'student_name'=> $student->firstname . ' '.$student->middlename.' '. $student->lastname,
            'library_location'=> $student->library_branch,
            'grade_level'=> $student->section,
            'attendance_date'=> now(),
            'status'=> 'present'
            ]);

        return response()->json([
            'success' => true,
            'student_number' => $student->student_number,
            'fullname'       => $student->firstname . ' ' . $student->lastname,
            'firstname'      => $student->firstname,
            'middlename'     => $student->middlename,
            'lastname'       => $student->lastname,
            'section'        => $student->section,
            'role'           => $student->school_role,
            'avatar'         => $student->avatar
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
            'middlename' => 'required',
            'lastname' => 'required',
            'school_role' => 'required',
            'library_branch' => 'required',
            'section' => 'required',
            'student_number' => 'required',
            'avatar' => 'image|max:3000|nullable'
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
        return redirect('/2')->with('logout', 'You are Logged Out');
    }

    public function login(Request $req){
    $values= $req->validate([
        'username' => 'required',
        'password' => 'required'
    ]);
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
        return redirect('/viewStudents');
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

        User::create($values);

        return redirect('/userRegister')->with('success', 'User registered successfully!');
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

    public function edit($students){
        $student = Student::where('student_number', $students)->first();
        return view('crud/edit', compact('student'));
    }

}
