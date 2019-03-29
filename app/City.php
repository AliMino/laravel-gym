<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    protected $fillable=[
        'name',
        'country_id',
    ];
    public function country() {
        return $this->belongsTo("App\Country");
    }
    public function manager() {
        return $this->belongsTo("App\User");
    }
}
