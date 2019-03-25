<?php

namespace App\Http\Controllers\Gym;

use App\Gym;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGymRequest;
use App\city;
use Illuminate\Support\Facades\Storage;
use Stripe\File;

class StoreController extends Controller
{
    public function store(StoreGymRequest $request) {
        $path = $request->file('img');
        Gym::create(request()->all());
        return redirect()->route('gyms.index');
        
    }

    public function index(){
        $gyms=Gym::all();
        $citites=city::all();
        return view ('gyms.index',[
            'gyms'=>$gyms,
            'cities'=>$citites
        ]);
    }

    

    public function data_gyms(){
        return datatables()->of(Gym::all())->toJson();
    }  
}
