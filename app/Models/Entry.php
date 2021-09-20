<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Entry extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'turn',
        'hour',
        'batch',
        'vehicle',
        'hygiene',
        'weight',
        'rejection',
        'extra',
        'observation',
        'availableweight',
        'availablejabas',
        'kind_id',
        'charge_id',
        'provider_id',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->user_id = Auth::id();
        });
    }

    public function wastes()
    {
        return $this->hasMany('App\Models\Waste');
    }
    public function research()
    {
        return $this->hasMany('App\Models\Research');
    }
    public function pallets()
    {
        return $this->hasMany('App\Models\Pallet');
    }
    public function refunds()
    {
        return $this->hasMany('App\Models\Refund');
    }
    public function processes()
    {
        return $this->hasMany('App\Models\Process');
    }
    public function kind()
    {
        return $this->belongsTo('App\Models\Kind');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function charge()
    {
        return $this->belongsTo('App\Models\Charge');
    }
    public function provider()
    {
        return $this->belongsTo('App\Models\Provider');
    }
}
