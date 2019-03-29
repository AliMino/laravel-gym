<?php

namespace App;

use App\PurchasedPackage;
use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    protected $fillable = [
        'name',
        'city_id',
        'image',
    ];

    public function city() {
        return $this->belongsTo('App\city','city_id');
    }
    public function purchasedPackages() {
        return PurchasedPackage::where("gym_id", "=", $this->id)->get();
    }
}
