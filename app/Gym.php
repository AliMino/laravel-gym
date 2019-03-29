<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    protected $fillable = [
        'name',
        'city_id',
        'image',
    ];

    public function city()
    {
        return $this->belongsTo('App\city','city_id');
    }
}
