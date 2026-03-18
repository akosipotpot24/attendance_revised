<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
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
        return response()->json([
            'success' => true,
            'name' => $student->firstname . ' ' . $student->lastname,
            'section' => $student->section
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
        Student::where('student_number', $student_number)->update($values);
        return redirect('/crud/edit/' . $student_number)->with('success', 'Student updated successfully!');
    }

     public function logout(){
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
        return redirect('/viewStudents');
    }
    else{
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
            'middlename' => 'required',
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

    public function edit($students){
        $student = Student::where('student_number', $students)->first();
        return view('crud/edit', compact('student'));
    }

}
