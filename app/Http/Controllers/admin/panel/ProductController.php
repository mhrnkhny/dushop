<?php

namespace App\Http\Controllers\admin\panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\propery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Image;

class ProductController extends adminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Products = Product::with('property')->orderBy('id', 'desc');
        if (\request()->filled('search')) {
            $Products = $Products->where('name', 'like', '%' . \request('search') . '%');
        }
        $Products = $Products->paginate(5);
        return view('panel.Products.index', compact('Products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.Products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {


        $products = new Product();
        $products->name = \request('name');
        $products->product_key = \request('product_key');
        $products->price = \request('price');
        $products->description = \request('description');
        $products->sex = \request('sex');
        $products->seller = \request('seller');
        $products->number = \request('number');
        $products->existence = \request('existence');
        $products->category_name = \request('category_name');
        $products->image = $this->storePic($request->file('image'));
        $products->save();

        alert()->success('tanks', 'insert your product is success')->autoclose(2500);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
        $products = Product::find($id);
        return view('panel.products.edit', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        $product->update([
            'name' => \request('name'),
            'product_key' => \request('product_key'),
            'price' => \request('price'),
            'description' => \request('description'),
            'sex' => \request('sex'),
            'seller' => \request('seller'),
            'number' => \request('number'),
            'existence' => \request('existence'),
            'category_name' => \request('category_name'),
            'image' => $this->storePic(\request()->file('image', null)),
        ]);
        alert()->success('tanks', 'update your product is success')->autoclose(2500);

        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        $product = Product::find($id);
        if (!empty($product->image)) {
            unlink($product->image);
        }
        $product->delete();
        alert()->success('tanks', 'delete your product is success')->autoclose(2500);

        return redirect()->back();
    }
}
