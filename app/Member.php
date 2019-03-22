<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable=[
        'name',
        'email',
        'password',
        'gender',
        'date of birth',
        'profile img'
    ];
}
