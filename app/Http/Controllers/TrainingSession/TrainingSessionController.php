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
        switch(auth()->user()->getRole()->id)
        {
            case 1: $sessions=TrainingSession::all(); break;
            case 2: $sessions =TrainingSession::join('gyms','training_sessions.gym_id','gyms.id')
                ->join('cities','gyms.city_id','cities.id')->where('cities.id',auth()->user()->city_id)
                ->select('training_sessions.*')->get();
                break;
            case 3: $sessions =TrainingSession::join('gyms','training_sessions.gym_id','gyms.id')
                ->where('gyms.id',auth()->user()->gym_id)->select('training_sessions.*')->get();
                break;
        }
        return datatables()->of($sessions)->toJson();
    }

    public function edit($id) {
        if($this->giveEditPermission($id)){
            if(count(Attendance::where('session_id',$id)->get())>0){
                $errors= new MessageBag();
                $errors->add('attendence','this session has people attending it');
                return view('sessions.index')->withErrors($errors);
            }else{
            return view('sessions.edit',[
                'session'=>TrainingSession::where('id',$id)->first(),
                ]);
        }
    }else{
        return redirect()->route('sessions.index');
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
    private function giveEditPermission($id){
        switch(auth()->user()->getRole()->id)
        {
            case 1: return true; break;
            case 2: $allowedSessions =TrainingSession::join('gyms','training_sessions.gym_id','gyms.id')
                ->join('cities','gyms.city_id','cities.id')->where('cities.id',auth()->user()->city_id)
                ->select('training_sessions.*')->get();
                foreach($allowedSessions as $session){
                        if($id==$session->id){
                            return true;
                        }
                    }
                break;
            case 3: $allowedSessions =TrainingSession::join('gyms','training_sessions.gym_id','gyms.id')
                ->where('gyms.id',auth()->user()->gym_id)->select('training_sessions.*')->get();
                  foreach($allowedSessions as $session){
                      if($id==$session-id){
                          return true;
                      }

                  }
                break;
        }
        return false;

    }

}
