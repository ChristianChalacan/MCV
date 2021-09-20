<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispatch extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'process_id',
    ];

    public function process()
    {
        return $this->belongsTo('App\Models\Process');
    }
}
