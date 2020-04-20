<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class Slider extends Model
{
    protected $fillable = ['image', 'name', 'title', 'product_id', 'coupon', 'description'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
