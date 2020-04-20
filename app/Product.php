<?php

namespace App;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class Product extends Model
{
    use Sluggable;
    use Rateable;
    protected $fillable = ['name', 'product_key', 'price', 'slug', 'description', 'sex', 'image', 'seller', 'existence', 'number', 'category_name'];


    public function path()
    {
        return "/home/$this->slug";
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'product_key'
            ]
        ];
    }

    public function coupon()
    {
        return $this->hasMany(Coupon::class);
    }

    public function is_liked_by_auth_user()
    {
        if (auth()->check())
            return Like::where('user_id', auth()->user()->id)
                ->where('product_id', $this->id)->first();
    }

    public function property()
    {
        return $this->hasMany(propery::class);
    }

    public function like()
    {
        return $this->hasMany(Like::class);
    }


}
