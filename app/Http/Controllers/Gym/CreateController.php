<?php

namespace App\Http\Controllers\Gym;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City;

class CreateController extends Controller
{
    public function create() {
        $cities=City::all();
        return view('gyms.create' ,[
            'cities'=>$cities,
        ]); 
    }
}
