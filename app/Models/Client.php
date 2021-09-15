<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'email',
    ];

    public function processes()
    {
        return $this->hasMany('App\Models\Process');
    }
    public function shippings()
    {
        return $this->hasMany('App\Models\Shipping');
    }
}
