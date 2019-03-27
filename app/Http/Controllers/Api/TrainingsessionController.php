<?php

namespace App\Http\Controllers\Api;

use App\Attendance;
use App\Member;
use App\PurchasedPackage;
use App\TrainingSession;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TrainingsessionController extends Controller
{
    public function ShowRemainingSessions()
    {
        $total_sessions=0;
        $id = Auth::user()->id;
        $attended_sessions = Attendance::where('member_id', $id)->count();
        $packages = Member::find($id)->training_package;
        foreach ($packages as $package){
            $total_sessions += $package->no_of_sessions;
         }
        $remaining_sessions=$total_sessions-$attended_sessions;
        $data = [
            "TotalSessions" => $total_sessions,
            "RemainingSessions" => $remaining_sessions

        ];
        return response()->json($data);

    }

    public function AttendSession($session)
    {

        $id = Auth::user()->id;
        $data=$this->ShowRemainingSessions();
        $object=json_decode($data->getContent());
        $remaining_session=$object->RemainingSessions;

        if ($remaining_session > 0)
        {
            $attendance=$this->StoreAttendance($session,$id);
        }
        else
        {
            $attendance = "you dont have sessions..you need to buy training sessions in order to attend";
        }

        return response()->json(["attendance"=>$attendance]);
    }

    public function StoreAttendance($session,$id)
    {
        $Current_day = Carbon::now()->setTimezone('Africa/Cairo');
        $current_date = Carbon::now()->toDateString();
        $current_time = Carbon::now()->toTimeString();
        $session = TrainingSession::find($session);
        $Session_date = Carbon::parse($session->start_at);
        if($Current_day->isSameDay($Session_date))
        {
            $attendance = new Attendance();
            $attendance->member_id = $id;
            $attendance->session_id = $id;
            $attendance->attendance_date = $current_date;
            $attendance->attendance_time = $current_time;
            $attendance->save();
           return $attendance="you are recorded to attend this session Successfully";
        }
        else
        {
            if($Session_date->isPast())
            {
                return $attendance = "The time of this session is gone";
            }
            else if($Session_date->isFuture())
            {
                return $attendance = "The time of this session does not come yet";
            }
        }
    }
}
