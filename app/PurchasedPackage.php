<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchasedPackage extends Model
{
    protected $fillable=[
        'member_id',
        'package_id',
        'paid_price',
        'num_of_sessions',
        'attended_sessions',
        'gym_id'

    ];

    public function member()
    {
        return $this->belongsTo(Member,'member_id');
    }

    public function trainingpackage()
    {
        return $this->belongsTo('App/TrainingPackage','package_id');
    }


    public function gym()
    {
        return $this->belongsTo(Gym,'gym_id');
    }
}
