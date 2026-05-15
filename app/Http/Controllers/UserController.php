<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class UserController extends Controller
{
    //

    public function update(Request $req, $student_number){
        $values=$req->validate([
            'firstname' => 'required',
            'middlename' => '',
            'lastname' => 'required',
            'school_role' => 'required',

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






    public function viewUsers(){
       $users =  User::all();
       return view('users.users', compact('users'));
    }

    public function edit($id){
        $users = User::findOrFail($id);;
        return view('users.edit', compact('users'));
    }

    public function viewAprrovals(){
       $query =  User::where('status', '0');
       $approves = $query->get();

       return view('/users/approvals', compact('approves'));
    }

    public function approveUser($id){
        // note: 
            //     *user_type
            //         0 = not a user
            //         1 = user
            //         2 = admin
            //         3 = superadmin
            //         4 = library user(scan)
            //     *status
            //         0 = pending
            //         1 = approved
            //         2 = declined  

        $user = User::findOrFail($id);
        if ($user->user_type == 4){
        $user->status = 1;
        $user->save();

        return redirect()->back()->with('success', 'User approved successfully!');
        }

        $user->user_type = 1;
        $user->status = 1;
        $user->save();

        return redirect()->back()->with('success', 'User approved successfully!');
    }


    public function declineUser($id){
        $user = User::findOrFail($id);
        $user->status = 2;
        $user->save();

        return redirect()->back()->with('success', 'User declined successfully!');
    }

    
}
