<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    protected $fillable=[
        'name',
    ];

    public function training_session()
    {
        return $this->belongsToMany(TrainingSession,'coaches_sessions'
            ,'coach_id','session_id');
    }
}
