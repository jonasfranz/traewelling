<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'email', 'password'
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

    public function socialProfile()
    {
        return $this->hasOne(SocialLoginProfile::class);
    }

    public function statuses(){
        return $this->hasMany('App\Status');
    }

    public function home() {
        return $this->hasOne('App\TrainStations', 'id', 'home_id');
    }

    public function likes() {
        return $this->hasMany('App\Like');
    }

    public function follows() {
        return $this->hasMany('App\Follow');
    }

    public function sessions() {
        return $this->hasMany('App\Session');
    }

}
