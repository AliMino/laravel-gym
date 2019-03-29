<?php

namespace App\Http\Controllers\Gym;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City;
use App\User;

class CreateController extends Controller
{
    public function create() {
        return view('gyms.create' ,[
            'cities'=>City::all(),
            'users'=>User::where('id','>',1)->get()
        ]);
    }
}
