<?php

namespace App\Http\Controllers\TrainingPackage;

use App\TrainingPackage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function store() {        
        TrainingPackage::create(request()->all());
        return redirect()->route('packages.index');
    }

    public function index(){
        return view('packages.index');
    }

    /**
     * Get the packages table as a json for jquery to render in DataTables .
     *
     * @return packagesTable(JSON)
     */

    public function get_table(){
        return datatables()->of(TrainingPackage::with('gyms'))->toJson();
    }
    
}
