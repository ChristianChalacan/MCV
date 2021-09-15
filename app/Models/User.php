<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function processes()
    {
        return $this->hasMany('App\Models\Process');
    }
    public function shippings()
    {
        return $this->hasMany('App\Models\Shipping');
    }
    public function observations()
    {
        return $this->hasMany('App\Models\Observation');
    }
    public function charges()
    {
        return $this->hasMany('App\Models\Charge');
    }
    public function refunds()
    {
        return $this->hasMany('App\Models\Refund');
    }
    public function entries()
    {
        return $this->hasMany('App\Models\Entry');
    }
}
