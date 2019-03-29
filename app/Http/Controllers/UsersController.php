<?php

namespace App\Http\Controllers;

use App\User;
use App\City;
use App\Gym;
use Illuminate\Http\Request;
use App\Country;
use App\Http\Requests\UpdateManagerRequest;

class UsersController extends Controller
{
    public function index() {
        return view('users.index',[
            'users' => User::all(),
            'cities' => City::all(),
            'gyms' => Gym::all(),
        ]);
    }

    public function show( $user)
    {
        return view('users.show',[
            'user'=>\Auth::user(),
        ]);
    }

    public function edit($user)
    {
        return view('users.edit',[
            'user'=>\Auth::user(),
            'cities'=>City::all(),
            'gyms'=>Gym::all(),
        ]);
    }

    
    public function update(UpdateManagerRequest $request, $user)
    {
        User::find($user)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'national_id'=>$request->national_id,
            'image'=>$request->avatar_img,
            'city_id'=>$request->city_id,
            'gym_id'=>$request->gym_id,
        ]);
        return redirect()->route('users.show',$user);
    }
}
