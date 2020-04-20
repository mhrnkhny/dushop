<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class galery extends Model
{
    protected $fillable = ['product_id', 'image'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
