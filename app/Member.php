<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Member extends Authenticatable implements JWTSubject,MustVerifyEmail
{
    use Notifiable;
    protected $fillable=[
        'name',
        'email',
        'password',
        'gender',
        'date of birth',
        'profile img'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function training_session()
    {
        return $this->belongsToMany(TrainingSession,'attendence'
            ,'member_id','session_id');
    }

    public function training_package()
    {
        return $this->belongsToMany('App\TrainingPackage','purchased_packages'
            ,'member_id','package_id');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
