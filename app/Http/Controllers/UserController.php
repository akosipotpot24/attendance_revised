<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
class UserController extends Controller
{
    //




    public function viewUsers(){
       $users =  User::all();
       return view('/users/users', compact('users'));
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
