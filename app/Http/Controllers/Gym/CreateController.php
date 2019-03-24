<?php

namespace App\Http\Controllers\Gym;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gym;

class CreateController extends Controller
{
    public function create() {
        $gyms=Gym::all();
        return view('gyms.create' ,[
            'gyms'=>$gyms,
        ]); 
    }
}
