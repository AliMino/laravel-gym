<?php

namespace App\Http\Controllers\Gym;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gym;
use App\Http\Requests\UpdateGymRequest;

class EditController extends Controller
{
    public function edit(Gym $gym){
        return view('gyms.edit',[
            'gym'=>$gym,
        ]);
    }

    public function update(UpdateGymRequest $request, $gym){
        $gym=Gym::Findorfail($gym);
        $gym->name=$request->name;
        //$gym->city_id=$request->city_id;
        $gym->gym_manager_id=$request->gym_manager_id;
        $gym->save();
        return redirect()->route("gyms.index");

    }
}
