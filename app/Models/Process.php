<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Process extends Model
{
    use HasFactory;
    protected $fillable = [
        'process',
        'hour',
        'turn',
        'initial',
        'jabas',
        'unit',
        'packing',
        'net',
        'product',
        'lot',
        'final',
        'guia',
        'observation',
    ];
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->user_id = Auth::id();
        });
    }

    public function dispatches()
    {
        return $this->hasMany('App\Models\Dispatch');
    }
    public function invoiceds()
    {
        return $this->hasMany('App\Models\Invoiced');
    }

    public function shipping()
    {
        return $this->belongsTo('App\Models\Shipping');
    }
    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }
    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function entry()
    {
        return $this->belongsTo('App\Models\Entry');
    }
}
