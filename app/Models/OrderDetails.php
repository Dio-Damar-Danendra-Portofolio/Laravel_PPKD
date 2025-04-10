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

    public function kepemilikan(){
        return $this->belongsTo(Orders::class, 'order_id', 'id');
    }
}
