<?php

namespace App\Http\Controllers\Gym;

use App\Gym;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGymRequest;

class StoreController extends Controller
{
    public function store(StoreGymRequest $request) {
        Gym::create(request()->all());
        return redirect()->route('index');
    }

    public function index(){
        return view ('gyms.index');
    }

    public function getdata(){
        return datatables()->of(Gym::all())->toJson();
    }
}
