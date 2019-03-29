<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {
        return view('users.index',[
            'users' => User::all(),
        ]);
    }

    public function show( $user)
    {
        return view('users.show',[
            'user'=>\Auth::user(),
        ]);
    }
}
