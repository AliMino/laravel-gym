<?php

namespace App\Http\Controllers\TrainingSession;


use App\TrainingSession;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\CoachesSession;
use Spatie\Period\Period;
use Illuminate\Support\MessageBag;
use App\Gym;
use App\Coach;
class StoreController extends Controller
{
    public function store(Request $request) {

        $request->validate([
            'name' => 'required',
            'coaches' => 'required',
        ]);
        if($this->validateTime($request))
        {
            $coaches=$request->get('coaches');
            TrainingSession::create([
                'name' => $request->name,
                'start_at' => $this->generateCarbon($request->get('start-date'),$request->get('start-time')),
                'end_at' => $this->generateCarbon($request->get('start-date'),$request->get('end-time')),
                'gym_id' => $request->gym_id]);

            foreach($coaches as $coach){
                CoachesSession::create([
                    'session_id' =>TrainingSession::latest()->first()->id,
                    'coach_id' => $coach]);
            }
            return redirect()->route('sessions.index');
        }else{
            $errors= new MessageBag();
            $errors->add('overlap','this gym has a session that overlaps with your input');
            return view('sessions.create',['gyms' => Gym::all(),'coaches' => Coach::all(),])->withErrors($errors);
        }


    }
    private function validateTime($request){
        $gym=$request->get('gym_id');
        $start=$this->generateCarbon($request->get('start-date'),$request->get('start-time'));
        $end=$this->generateCarbon($request->get('start-date'),$request->get('end-time'));
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
