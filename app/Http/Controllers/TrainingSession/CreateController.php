<?php

namespace App\Http\Controllers\TrainingSession;

use App\Gym;
use App\Coach;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class CreateController extends Controller
{
    public function create() {
        switch(auth()->user()->getRole()->id)
        {
            case 1: $gyms =Gym::all() ; break;
            case 2: $gyms =Gym::where('city_id',auth()->user()->city_id)->get(); break;
            case 3: $gyms =Gym::where('city_id',auth()->user()->gym_id)->get(); break;
        }
        return view('sessions.create',[
            'gyms' => $gyms,
            'coaches' => Coach::all(),
        ]);
    }
}
