<?php

namespace App\Http\Controllers\site;

use App\Color;
use App\Comment;
use App\Coupon;
use App\galery;
use App\Http\Controllers\Controller;
use App\Product;
use App\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class productShowController extends Controller
{



    public function allProduct()
    {
        $products = DB::table('products')->orderBy('id');
        if (\request()->filled('search')) {
            $products = $products->where('name', 'like', '%' . \request('search') . '%');
        }
        if (request()->has(['minamount', 'maxamount'])) {
            $products = DB::table('products')->whereBetween('price', [request('minamount'), request('maxamount')]);
        }
        $products = $products->paginate(9);
        return view('home.allProduct', compact('products'));
    }





    public function product_page($id)
    {
        $products = Product::where('slug', $id)->first();
        $products2 = Product::orderBy('created_at', 'desc')->where('category_name', 'like', $products->category_name)->limit(5)->get();
        $galery = galery::where('product_id', $products->id)->get();
        $coupons = Coupon::where('product_id', $products->id)->where('amount', '!=', null)->get();
        $comments = Comment::where('success', 1)->where('question', 0)->where('product_id', $products->id)->get();
        $sizes = Size::where('product_id', $products->id)->get();
        $colors = Color::where('product_id', $products->id)->get();
        if (\request()->filled('search')) {
            $pro = Product::orderBy('id');
            $products = $pro->where('name', 'like', '%' . \request('search') . '%');
            $products = $products->paginate(9);
            return view('home.allProduct', compact('products'));
        }
        return view('home.product_page', compact('products', 'products2', 'galery', 'colors', 'coupons', 'comments', 'sizes'));
    }





    public function productAdd(Request $request)
    {
        if (session::has('carts')) {
            $carts = session::get('carts');
            if (array_key_exists($request->id, $carts)) {
                $carts[$request->id]++;
            } else {
                $carts[$request->id] = 1;
            }
        } else {
            $carts = array();
            $carts[$request->id] = 1;
        }
        session::put('carts', $carts);

        return view('home.bascket');
    }
}
