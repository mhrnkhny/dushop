<?php

namespace App\Http\Controllers\admin\panel;

use App\Coupon;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $coupons = Coupon::orderBy('id');
        if (\request()->filled('search')) {
            $coupons = $coupons->where('discount', 'like', '%' . \request('search') . '%');
        }
        $coupons = $coupons->paginate(5);
        return view('panel.Products.coupon.create', compact('products', 'coupons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Coupon::create([
            'product_id' => $request['product_id'],
            'discount' => $request['discount'],
            'amount' => $request['amount'],
            'discount_object' => $request['discount_object'],
        ]);
        alert()->success('tanks','insert your coupon is success')->autoclose(2500);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupons = Coupon::find($id);
        $products = Product::all();

        return view('panel.Products.coupon.edit', compact('coupons','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $coupons = Coupon::find($id);
        $coupons->update([
            'product_id' => $request['product_id'],
            'discount' => $request['discount'],
            'amount' => $request['amount'],
            'discount_object' => $request['discount_object'],
        ]);
        alert()->success('tanks','update your coupon is success')->autoclose(2500);

        return redirect(route('coupon.create'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Coupon::find($id)->delete();
        alert()->success('tanks','delete your coupon is success')->autoclose(2500);

        return redirect()->back();
    }
}
