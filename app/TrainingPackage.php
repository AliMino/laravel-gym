<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingPackage extends Model
{
    protected $fillable = [
        'no_of_sessions',
        'price_cent',
    ];

    public function gyms(){
        return $this->belongsTo('App\Gym','id','id');
    }

    public static function getPackagePriceAttribute($cents){
        $dollars = $cents / 100;
        return $dollars;
    }
    public function setPackagePriceAttribute($dollars){
        $this->attributes['price_cents'] = $dollars * 100 ;
    }
}
