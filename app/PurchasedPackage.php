<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchasedPackage extends Model
{
    protected $fillable=[
        'member_id',
        'package_id',
        'paid_price',
        'gym_id'

    ];

    public function member()
    {
        return $this->belongsTo('App\Member','member_id');
    }

    public function trainingpackage()
    {
        return $this->belongsTo('App/TrainingPackage','package_id');
    }


    public function gym()
    {
        return $this->belongsTo('App\Gym','gym_id');
    }
}
