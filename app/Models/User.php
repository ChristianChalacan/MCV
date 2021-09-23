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
    const ROLE_SUPERADMIN = 'ROLE_SUPERADMIN';
    const ROLE_ADMIN = 'ROLE_ADMIN';
    const ROLE_PRODUCTION = 'ROLE_PRODUCTION';
    const ROLE_TRANSPORTATION = 'ROLE_TRANSPORTATION';

    private const ROLES_HIERARCHY = [
        self::ROLE_SUPERADMIN => [self::ROLE_ADMIN],
        self::ROLE_ADMIN => [self::ROLE_PRODUCTION],
        self::ROLE_PRODUCTION => [self::ROLE_TRANSPORTATION],
        self::ROLE_TRANSPORTATION => []
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

    public function isGranted($role)
    {
        if ($role === $this->role) {
            return true;
        }
        return self::isRoleInHierarchy($role, self::ROLES_HIERARCHY[$this->role]);
    }
    private static function isRoleInHierarchy($role, $role_hierarchy)
    {
        if (in_array($role, $role_hierarchy)) {
            return true;
        }
        foreach ($role_hierarchy as $role_included) {
            if(self::isRoleInHierarchy($role,self::ROLES_HIERARCHY[$role_included]))
            {
                return true;
            }
        }
        return false;
    }
}
