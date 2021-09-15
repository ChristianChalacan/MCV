<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'date_delivery',
        'order_date',
    ];

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
