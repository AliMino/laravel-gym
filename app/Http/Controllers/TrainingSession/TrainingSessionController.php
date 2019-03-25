<?php

namespace App\Http\Controllers\TrainingSession;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TrainingSession;
use App\Gym;
use DB;
class TrainingSessionController extends Controller
{
    public function index() {

        // return(DB::table('training_sessions')
        //         ->join('gyms', 'gyms.id', '=', 'training_sessions.gym_id')
        //         ->join('cities', 'cities.id', '=', 'gyms.city_id')
        //         ->select('training_sessions.name','gyms.name','cities.name')
        // ->get());
       return view('sessions.index');
    }



    public function getdata() {
        return datatables()->of(TrainingSession::all())->toJson();
    }



}
