<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingPackage extends Model
{
    protected $fillable = [
        'no_of_sessions',
        'price_cent',
    ];
}
