<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table="attendance";

    protected $fillable = ["member_id","session_id","attendance_date","attendance_time"];

    public function session()
    {
        return $this->belongsTo(TrainingSession,'session_id');
    }
    public function member()
    {
        return $this->belongsTo(Member,'member_id');
    }
}
