<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class propery extends Model
{
    protected $fillable = ['product_id', 'property_text'];
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
