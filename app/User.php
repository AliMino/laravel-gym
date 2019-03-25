<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        //Managers
        'national_id','avatar_img','city_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function training_session()
    {
        return $this->belongsToMany(TrainingSession,'attendence'
            ,'user_id','session_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function getRole() {
        return DB::table('roles')
        ->join('model_has_roles', 'model_has_roles.role_id', 'roles.id')
        ->first();
    }
}
