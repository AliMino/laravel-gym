<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCityRequest;
use App\Http\Requests\UpdateCityRequest;

class CitiesController extends Controller
{
    public function create() {
        // County::all() returns over 200 corrupted results
        // use this instead
        // all countries are 25 with max id of 76
        return view('cities.create', [
            'countries' => Country::where('id', '<', 77)->get(),
            'last_selected_country' => Country::where('id', '=', 4)->first(),
            // 'cities' => City::where('country_id', '=', 4)->get()
        ]);
    }
    public function store(CreateCityRequest $request) {
        City::create($request->all());
        
        return view('cities.index', [
            'countries' => Country::where('id', '<', 77)->get(),
            'last_selected_country' => Country::where('id', '=', $request->country_id)->first(),
        ]);
    }

    public function index() {
        return view('cities.index', []);
    }

    public function edit(City $city) {
        return view('cities.edit', [
            'city' => $city,
        ]);
    }

    public function update(City $city, UpdateCityRequest $request) {
        City::where("id", "=", 1)->first()->update($request->all());
        return redirect()->route('cities.index');
    }

    public function data_table(){
        return datatables(City::all())
        ->addColumn('countryName', function(City $city) {
            return Country::where("id", "=", $city->country_id)->first()->name;
        })->toJson();
    }
}
