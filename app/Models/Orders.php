<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use function PHPUnit\Framework\returnArgument;

class Orders extends Model
{
    protected $fillable = [
        'order_amount',
        'order_change',
        'order_status',
        'order_date',
        'order_code'
    ];

    public function orderDetails(){
        return $this->hasMany(OrderDetails::class, 'order_id', 'id');
    }
}
