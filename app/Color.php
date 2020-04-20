<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = ['product_id', 'colorName'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
