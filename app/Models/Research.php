<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory;
    protected $fillable = [
        'feature',
        'quantity',
        'valueone',
        'valuetwo',
        'valuethree',
        'valuefour',
        'valuefive',
        'confirmed',
        'organoleptic',
        'entry_id',
    ];

    public function entry()
    {
        return $this->belongsTo('App\Models\Entry');
    }
}
