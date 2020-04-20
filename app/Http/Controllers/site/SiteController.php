<?php

namespace App\Http\Controllers\site;

use App\Color;
use App\Comment;
use App\Coupon;
use App\galery;
use App\Http\Controllers\Controller;
use App\Product;
use App\Size;
use App\Slider;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function index()
    {

        $products1 = Product::with('like')->orderBy('created_at', 'desc')->limit(5)->get();
        $products2 = Product::with('like')->orderBy('id', 'desc')->limit(8)->get();
        $sliders = Slider::orderBy('created_at','desc')->limit(5)->get();
        $pro = Product::orderBy('id');

        if (\request()->filled('search')) {
            $products = $pro->where('name', 'like', '%' . \request('search') . '%');
            $products = $products->paginate(9);
            return view('home.allProduct', compact('products'));
        }

        return view('home.index', compact('products1', 'products2', 'sliders', 'pro'));
    }








}
