<?php

namespace App\Http\Controllers;

use App\User;
use App\City;
use App\Gym;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {
        return view('users.index',[
            'users' => User::all(),
            'cities' => City::all(),
            'gyms' => Gym::all(),
        ]);
    }
}
