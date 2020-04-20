<?php

namespace App\Http\Controllers\admin\panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\SizeRequest;
use App\Product;
use App\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
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
        $sizes = Size::orderBy('id');
        if (\request()->filled('search')) {
            $sizes = $sizes->where('sizeA', 'like', '%' . \request('search') . '%');
        }
        $sizes = $sizes->paginate(5);
        return view('panel.Products.size.create', compact('products', 'sizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SizeRequest $request)
    {
        Size::create([
            'product_id' => $request['product_id'],
            'sizeA' => $request['sizeA'],
            'sizeB' => $request['sizeB'],
        ]);
        alert()->success('tanks','insert your size is success')->autoclose(2500);

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
        $sizes = Size::find($id);
        $products = Product::all();
        return view('panel.Products.size.edit', compact('sizes','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SizeRequest $request, $id)
    {
        $sizes = Size::find($id);
        $sizes->update([
            'product_id' => $request['product_id'],
            'sizeA' => $request['sizeA'],
            'sizeB' => $request['sizeB'],
        ]);
        alert()->success('tanks','update your size is success')->autoclose(2500);

        return redirect(route('size.create'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Size::find($id)->delete();
        alert()->success('tanks','delete your size is success')->autoclose(2500);

        return redirect()->back();
    }
}
