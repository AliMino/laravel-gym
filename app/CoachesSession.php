<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoachesSession extends Model
{

    protected $fillable=[
        'session_id',
        'coach_id',
    ];
}
