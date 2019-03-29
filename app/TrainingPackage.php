<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingPackage extends Model
{
    protected $fillable = [
        'no_of_sessions',
        'price_cent',
        'name',
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
    public function getPrice() {
        return $this->price_cent / 100;
    }
}
