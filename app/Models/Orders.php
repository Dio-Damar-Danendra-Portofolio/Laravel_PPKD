<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = [
        'order_amount',
        'order_change',
        'order_status',
        'order_date',
        'order_code'
    ];
}
