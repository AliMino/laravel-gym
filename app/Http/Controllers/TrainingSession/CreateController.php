<?php

namespace App\Http\Controllers\TrainingSession;

use App\Gym;
use App\TrainingPackage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function create() {
        return view('sessions.create',[
            'gyms' => Gym::all(),
            'packages' => TrainingPackage::all()
        ]);
    }
}
