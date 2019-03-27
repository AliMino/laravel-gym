<?php

namespace App\Http\Controllers\TrainingSession;


use App\TrainingSession;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Gym;
use Spatie\Period\Period;
class StoreController extends Controller
{
    public function store(Request $request) {
        if($this->validateTime($request))
        {
            TrainingSession::create([
                'name' => $request->name,
                'start_at' => now(),
                'end_at' => now(),
                'gym_id' => $request->gym_id]);
        }

        // return redirect()->route('home');
    }
    private function validateTime($request){
        $gym=$request->get('gym_id');
        $startDate=$request->get('start-date');
        $startTime=$request->get('start-time');
        $endTime=$request->get('end-time');
        $start=$this->generateCarbon($startDate,$startTime);
        $end=$this->generateCarbon($startDate,$endTime);
        if($this->isOverlap($start,$end,$gym)){
            // return false if time is invalid
            return false;
        }
        return true;
    }
    private function generateCarbon($date,$time){
        $dateArr = explode('-',$date);
        $timeArr = explode(':',$time);
        $carbonObj = Carbon::create((int)$dateArr[0],(int)$dateArr[1],(int)$dateArr[2],(int)$timeArr[0],(int)$timeArr[1],00);
        return $carbonObj;
    }
    private function isOverlap($start,$end,$gym){
        $selectedTime=Period::make($start,$end);
        $gymSessions = TrainingSession::where('gym_id',$gym)->get();
        foreach($gymSessions as $session){
           $compare=Period::make(new Carbon($session->start_at),new Carbon($session->end_at));
           if($selectedTime->overlapsWith($compare)){
                return true;
           }
        }
        return false;
    }
}
