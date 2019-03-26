<?php

namespace App\Http\Controllers\Api;

use App\Attendance;
use App\Member;
use App\PurchasedPackage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
            "Total Sessions" => $total_sessions,
            "Remaining Sessions" => $remaining_sessions

        ];
        return response()->json($data);

    }
}
