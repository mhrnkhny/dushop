<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = ['product_id', 'discount', 'amount', 'discount_object'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
