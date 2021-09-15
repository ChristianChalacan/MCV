<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }
    public function kinds()
    {
        return $this->hasMany('App\Models\Kind');
    }
}
