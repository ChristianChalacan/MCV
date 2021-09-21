<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'phone',
    ];
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
    public function products()
    {
        return $this->belongsToMany('App\Models\Product')->as('sell')->withTimestamps();
    }
}
