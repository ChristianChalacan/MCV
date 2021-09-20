<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waste extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity',
        'entry_id',
    ];
    public function entry()
    {
        return $this->belongsTo('App\Models\Entry');
    }
}
