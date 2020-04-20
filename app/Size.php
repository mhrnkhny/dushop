<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = ['product_id', 'sizeA', 'sizeB'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
