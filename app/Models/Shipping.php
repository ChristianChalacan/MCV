<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'confirmed',
    ];

    public function processes()
    {
        return $this->hasMany('App\Models\Process');
    }
    public function observations()
    {
        return $this->hasMany('App\Models\Observation');
    }
    public function orders()
    {
        return $this->hasMany('App\Models\Orders');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }
}
