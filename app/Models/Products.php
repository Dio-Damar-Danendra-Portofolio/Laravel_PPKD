<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'product_name',
        'product_price',
        'category_id',
        'is_active',
        'product_photo',
        'product_description'
    ];

    public function category(){
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }

    public function order_details(){
        return $this->belongsToMany(OrderDetails::class, 'product_id', 'id');

    }
}
