<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    protected $fillable = [
        'name',
        'city_id',
        'gym_manager_id',
    ];

    public function city()
    {
        return $this->belongsTo(city,'city_id');
    }
}
