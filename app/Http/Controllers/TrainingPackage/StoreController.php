<?php

namespace App\Http\Controllers\TrainingPackage;

use App\TrainingPackage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function store() {
        echo('store training package');
        TrainingPackage::create(request()->all());
        // return redirect()->route('home');
    }
}
