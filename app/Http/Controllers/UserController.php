<?php

namespace App\Http\Controllers;
use App\Events\StudentUpdated;
use App\Events\UserEvent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class UserController extends Controller
{
    //

    public function update(Request $req, $id){
        $values=$req->validate([
            'id' => 'required',
            'fullname' => 'required',
            'email' => 'email|nullable',
            'avatar' => 'image|max:8000|nullable'
        ]);

  
      if ($req->hasFile('avatar')) {

        $filename = $values['id'] . uniqid() . ".jpg";
        $oldavatar = User::where('id', $id)->value('avatar');
        $manager = new ImageManager(new Driver());
        $image = $manager->read($req->file("avatar"));
        $imgData = $image->cover(400, 400)->toJpg();
        Storage::disk('public')->put('userAvatar/' . $filename, $imgData);
        $values['avatar'] = $filename;

         if ($oldavatar && $oldavatar !== 'default.png') {
            Storage::disk('public')->delete('userAvatar/' . $oldavatar);
        }
    }
        
        // Student::where('id_number', $id)->update($values);
             $user = User::where('id', $id)->first();  
            $user->fill($values);

        $changes = [];
        foreach ($user->getDirty() as $field => $newValue) {
            $changes[$field] = [
                'old' => $user->getOriginal($field),
                'new' => $newValue
            ];
        }

        $user->save();

        event(new UserEvent(auth()->user(), $changes));

        return redirect('/users/edit/'.$id)->with('success', 'updated successfully!');
    }






        public function viewUsers(){
        $users =  User::where('status',1)->get();
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
