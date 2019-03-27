<?php

namespace App\Http\Controllers\TrainingSession;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TrainingSession;
use App\Gym;
use App\CoachesSession;
use App\Attendance;
use Carbon\Carbon;
use Spatie\Period\Period;
use Illuminate\Support\MessageBag;
class TrainingSessionController extends Controller
{
    public function index() {

       return view('sessions.index');
    }
    public function getdata() {
        return datatables()->of(TrainingSession::all())->toJson();
    }

    public function edit($id) {
        if(count(Attendance::where('session_id',$id)->get())>0){
                $errors= new MessageBag();
                $errors->add('attendence','this session has people attending it');
                return view('sessions.index')->withErrors($errors);
        }else{
            return view('sessions.edit',[
                'session'=>TrainingSession::where('id',$id)->first(),
                ]);
        }
    }

    public function update(Request $request,$id) {

        if($this->validateTime($request,$id))
        {
            TrainingSession::where('id',$id)->update([
                'start_at' => $this->generateCarbon($request->get('start-date'),$request->get('start-time')),
                'end_at' => $this->generateCarbon($request->get('start-date'),$request->get('end-time')),
                ]);

            return redirect()->route('sessions.index');
        }else{
                $errors= new MessageBag();
                $errors->add('overlap','this gym has a session that overlaps with your input');
                return view('sessions.edit',['session'=>TrainingSession::where('id',$id)->first()])->withErrors($errors);
        }


    }

    public function destroy($id) {

        if(count(Attendance::where('session_id',$id)->get())>0){
            return response()->json([
                'error' => 'failed to delete'
            ],400);
        }else{
            $sessions=CoachesSession::where('session_id',$id)->get();
            foreach($sessions as $session){
                $session->delete();
            }
            $session=TrainingSession::find($id);
            $session->delete();
            return response()->json([
                'success' => 'Record deleted successfully!'
            ]);
        }
    }


    private function validateTime($request,$id){ // session id
        $gym=TrainingSession::where('id',$id)->first()->gym_id;
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
