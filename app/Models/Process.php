<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
