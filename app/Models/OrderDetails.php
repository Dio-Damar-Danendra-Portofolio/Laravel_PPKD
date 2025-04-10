<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $fillable = [
        'qty',
        'order_price',
        'order_subtotal',
        'product_id',
        'order_id'
    ];

    public function kepemilikan_pesanan(){
        return $this->belongsTo(Orders::class, 'order_id', 'id');
    }

    public function kepemilikan_produk(){
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }
}
