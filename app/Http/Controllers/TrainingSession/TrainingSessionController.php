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
       return view('sessions.index');
    }



    public function getdata() {
        return datatables()->of(TrainingSession::all())->toJson();
    }



}
