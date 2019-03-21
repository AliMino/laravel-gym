<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchasedPackage extends Model
{
    protected $fillable=[
        'user_id',
        'package_id',
        'paid_price',
        'num_of_sessions',
        'attended_sessions',
        'gym_id'

    ];

    public function user()
    {
        return $this->belongsTo(User,'user_id');
    }

    public function trainingpackage()
    {
        return $this->belongsTo(TrainingPackage,'package_id');
    }

    public function gym()
    {
        return $this->belongsTo(Gym,'gym_id');
    }
}
