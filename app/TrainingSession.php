<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingSession extends Model
{
    protected $fillable = [
        'name',
        'start_at',
        'end_at',
        'gym_id',
        'package_id',
    ];

    public function TrainingPackage() {
        return $this->belongsTo(TrainingPackage::class);
    }
}
