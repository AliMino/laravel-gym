<?php

namespace App\Http\Controllers\TrainingPackage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gym;
use App\TrainingPackage;

class CreateController extends Controller
{

    public function create() {
        switch(auth()->user()->getRole()->id)
        {
            case 1: $gyms =Gym::all() ; break;
            case 2:
            case 3: return redirect()->route('payment.create');
        }
        return view('packages.create',[
            'gyms'=>Gym::all(),
        ]);
    }
}
