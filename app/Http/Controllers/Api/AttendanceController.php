<?php

namespace App\Http\Controllers\Api;

use App\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Array_;

class AttendanceController extends Controller
{
    public function ShowHistory()
    {
        $history=[];
        $id = Auth::user()->id;
        $attendances=Attendance::where('member_id',$id)->get();
        foreach ($attendances as $attendance)
        {
            $history [] = [
                'session_name' => $attendance->session->name,
                'gym_name'=> $attendance->session->gym->name,
                'attendance date' => $attendance->attendance_date,
                'attendance_time'=> $attendance->attendance_time
            ];
        }
        if ($history)
        {
            return $history;
        }
        return response()->json([
            'Msg' => 'You dont have a history',

        ]);

    }
}
