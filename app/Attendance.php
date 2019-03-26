<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table="attendance";

    protected $fillable = ["member_id","session_id","attendance_date","attendance_time"];

    public function session()
    {
        return $this->belongsTo('App\TrainingSession');
    }
    public function member()
    {
        return $this->belongsTo('App\Member');
    }

    public function gym(){
        return $this->belongsTo('App\Gym');
    }

    public function city(){
        return $this->belongsTo('App\City');
    }
}
