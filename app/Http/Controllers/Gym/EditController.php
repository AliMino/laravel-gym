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

    public function update(UpdateGymRequest $request,Gym $gym){
        $gym->update($request->all());
        $gym->save();
        return redirect()->route("gyms.index");

    }
}
