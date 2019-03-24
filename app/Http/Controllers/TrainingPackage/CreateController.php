<?php

namespace App\Http\Controllers\TrainingPackage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gym;

class CreateController extends Controller
{
    public function create() {
        $gyms=Gym::all();
        return view('packages.create',[
            'gyms'=>$gyms,
        ]);
    }
}
