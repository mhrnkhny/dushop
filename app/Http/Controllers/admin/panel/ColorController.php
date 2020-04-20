<?php

namespace App\Http\Controllers\admin\panel;

use App\Color;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use test\Mockery\ReturnTypeObjectTypeHint;

class ColorController extends Controller
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
        $colors = Color::orderBy('id');
        if (\request()->filled('search')) {
            $colors = $colors->where('colorName', 'like', '%' . \request('search') . '%');
        }
        $colors = $colors->paginate(5);
        return view('panel.products.color.create', compact('products', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Color::create([
            'colorName' => $request['colorName'],
            'product_id' => $request['product_id'],
        ]);
        return back();
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
        $colors = Color::find($id);
        $products = Product::all();
        return view('panel.products.color.edit', compact('colors','products'));
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
        $colors = Color::find($id);
        $colors->update([
            'colorName' => $request['colorName'],
            'product_id' => $request['product_id'],
        ]);
        return redirect(route('color.create'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Color::find($id)->delete();
        return back();

    }
}
