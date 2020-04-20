<?php

namespace App\Http\Controllers;

use App\Address;
use App\Comment;
use App\Coupon;
use App\Http\Requests\InfoRequest;
use App\Http\Requests\PhoneRequest;
use App\Http\Requests\UserRequest;
use App\payment;
use App\Phone;
use App\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use willvincent\Rateable\Rating;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function storeStar(Request $request)

    {

        request()->validate(['rate' => 'required']);
        $product = Product::find($request->id);
        $rating = new Rating();
        $rating->rating = $request->rate;
        $rating->user_id = auth()->user()->id;
        $product->ratings()->save($rating);
        alert()->message('با تشکر', 'امتیازدهی شما به درستی ثبت شد ')->persistent('بستن');

        return redirect()->back();

    }

    public function cart()
    {
        if (\request()->filled('search')) {
            $pro = Product::orderBy('id');
            $products = $pro->where('name', 'like', '%' . \request('search') . '%');
            $products = $products->paginate(9);
            return view('home.allProduct',compact('products'));
        }
        return view('home.bascket');
    }

    public function factor()
    {
        if (\request()->filled('search')) {
            $pro = Product::orderBy('id');
            $products = $pro->where('name', 'like', '%' . \request('search') . '%');
            $products = $products->paginate(9);
            return view('home.allProduct',compact('products'));
        }
        $payments = payment::all();
        return view('home.factor',compact('payments'));
    }









}
