<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Refund extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity',
        'confirmed',
        'observation',
        'provider_id',
        'entry_id',
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
    public function entry()
    {
        return $this->belongsTo('App\Models\Entry');
    }
    public function provider()
    {
        return $this->belongsTo('App\Models\Provider');
    }
}
