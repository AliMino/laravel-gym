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
}
