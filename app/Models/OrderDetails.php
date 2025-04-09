<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $fillable = [
        'qty',
        'order_price',
        'order_subtotal',
        'order_status'
    ];

    public function dkfjhkh(){
        return $this->belongsTo();
    }
}
