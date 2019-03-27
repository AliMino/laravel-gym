<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table="attendance";

    protected $fillable = ["member_id","session_id","attendance_date","attendance_time"];

    public function member()
    {
        return $this->belongsTo('App\Member','member_id');
    }
    public function session(){
        return $this->belongsTo('App\TrainingSession','session_id');
    }
}
