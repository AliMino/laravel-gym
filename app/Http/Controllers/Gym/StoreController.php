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
        $path = $request->file('public/img');
        Gym::create(request()->all());
        return redirect()->route('gyms.index');
        
    }

    public function index(){
        $gyms=Gym::all();        

        return view ('gyms.index',[
            'gyms'=>$gyms,            
        ]);
    }

    

    public function data_gyms(){
        
        if(auth()->user()->getRole()->name === "admin") {
            
            return datatables(Gym::all())
            ->addColumn('city', function(Gym $gym) {
                return City::where("id", "=", $gym->city_id)->first()->name;
            })
            ->addColumn('timestamp', function(Gym $gym) {
                return $gym->created_at->format('M d Y - h:m:s a');
            })->toJson();
        } else if(auth()->user()->getRole()->name === "city manager") {
            
            return datatables(Gym::where("city_id", "=", auth()->user()->city_id))
            ->addColumn('city', function(Gym $gym) {
                return City::where("id", "=", $gym->city_id)->first()->name;
            })->addColumn('timestamp', function(Gym $gym) {
                return $gym->created_at->format('M d Y - h:m:s a');
            })->toJson();
        }
    }  
    
}
