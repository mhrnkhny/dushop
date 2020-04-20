<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['postal_code', 'user_id', 'address'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
