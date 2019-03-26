<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingSession extends Model
{
    protected $fillable = [
        'name',
        'start_at',
        'end_at',
        'gym_id',

    ];

//    public function TrainingPackage() {
//        return $this->belongsTo(TrainingPackage::class);
//    }

    public function gym()
    {
        return $this->belongsTo('App/Gym','gym_id');
    }

    public function user()
    {
        return $this->belongsToMany('App/User','attendence'
            ,'session_id','user_id');
    }

    public function coach()
    {
        return $this->belongsToMany('App/Coach','coaches_sessions'
            ,'session_id','coach_id');
    }

    public function trainingpackage()
    {
        return $this->belongsToMany('App/TrainingPackage','packages_sessions'
            ,'session_id','package_id');

    }

}
