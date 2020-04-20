<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    protected $fillable = ['user_id', 'authority', 'success', 'code'];

    public function product()
    {
        return $this->belongsToMany(Product::class);
    }
}
