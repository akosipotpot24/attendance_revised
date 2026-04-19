<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //

    public function viewUsers(){
       $query =  User::where('user_type',0) -> where('status',0);
       $users = $query->get();

       return redirect('/users/approvals', compact('users'));
    }
}
