<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
class UserController extends Controller
{
    //

    public function viewUsers(){
       $query =  User::where('status', '0');
       $users = $query->get();

       return view('/users/approvals', compact('users'));
    }

    public function approveUser($id){
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
