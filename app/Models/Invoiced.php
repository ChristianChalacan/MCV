<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoiced extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity',
    ];

    public function process()
    {
        return $this->belongsTo('App\Models\Process');
    }
}
