<?php

namespace App\Http\Controllers\Gym;

use App\Gym;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function store()
    {
        echo('store gym');
        // dd(request());
        Gym::create(request()->all());
        // return redirect()->route('home');
    }
}
