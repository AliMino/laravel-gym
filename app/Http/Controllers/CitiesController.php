<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    public function create() {
        // County::all() returns over 200 corrupted results
        // use this instead
        // all countries are 25 with max id of 76
        return view('cities.create', [
            'countries' => Country::where('id', '<', 77)->get()
        ]);
    }
    public function store() {
        if(City::where('name', '=', request()->name)->first() == null) {
            City::create(request()->all());
        }
        return view('cities.create', [
            'countries' => Country::where('id', '<', 77)->get()
        ]);
    }
}
