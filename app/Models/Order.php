<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity',
        'product_id',
        'shipping_id'
    ];
    public function processes()
    {
        return $this->hasMany('App\Models\Process');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
    public function shipping()
    {
        return $this->belongsTo('App\Models\Shipping');
    }
}
