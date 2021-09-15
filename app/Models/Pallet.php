<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pallet extends Model
{
    use HasFactory;
    protected $fillable = [
        'gross_weight',
        'pallet_weight',
        'unit',
        'gaveta_weight',
        'net_weight',
    ];

    public function entry()
    {
        return $this->belongsTo('App\Models\Entry');
    }
}
