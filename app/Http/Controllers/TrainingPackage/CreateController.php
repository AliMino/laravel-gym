<?php

namespace App\Http\Controllers\TrainingPackage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gym;
use App\TrainingPackage;

class CreateController extends Controller
{
    public function create() {
        return view('packages.create',[
            'gyms'=>Gym::all(),
        ]);
    }
}
