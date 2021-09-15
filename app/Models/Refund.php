<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity',
        'confirmed',
        'observation',

    ];

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
