<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Observation extends Model
{
    use HasFactory;
    protected $fillable = [
        'observation',
        'shipping_id',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->user_id = Auth::id();
        });
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function shipping()
    {
        return $this->belongsTo('App\Models\Shipping');
    }
}
