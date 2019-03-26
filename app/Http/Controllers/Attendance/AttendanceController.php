<?php

namespace App\Http\Controllers\Attendance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Attendance;

class AttendanceController extends Controller
{
    public function index(){
        $attendance=Attendance::all(); 
        return view ('attendance.index',[
            'attendance'=>$attendance,       
        ]);
    }

    public function data_attend(){
        return datatables()->of(Attendance::with('member','session','gym','city'))->toJson();
            }
}
