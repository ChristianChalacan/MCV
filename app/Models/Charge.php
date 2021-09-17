<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Charge extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'date_delivery',
        'order_date',
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
    public function provider()
    {
        return $this->belongsTo('App\Models\Provider');
    }
    public function entries()
    {
        return $this->hasMany('App\Models\Entry');
    }
}
