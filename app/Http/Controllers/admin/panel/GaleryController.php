<?php

namespace App\Http\Controllers\admin\panel;

use App\galery;
use App\Http\Controllers\Controller;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class GaleryController extends Controller
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
        $galeries = galery::with('product')->orderBy('product_id')->paginate(20);
        return view('panel.Products.galery.create', compact('products', 'galeries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $now = Carbon::now();
        $month = $now->month;
        $year = $now->year;
        $location = "storage/uploadGalery/{$year}/{$month}/";
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName($location);
            $image = $image->move($location, $fileName);
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(1000, 1358);
            $image_resize->save(public_path($location . $fileName), 60);
            $fileName = $location . $fileName;
        }
        galery::create([
            'product_id' => $request['product_id'],
            'image' => $fileName,
            'slider' => '0',
        ]);
        alert()->success('tanks', 'insert your photo is success')->autoclose(2500);

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = galery::find($id);
        if (!empty($image->image)) {
            unlink($image->image);
        }
        $image->delete();

        alert()->success('tanks', 'delete your phone is success')->autoclose(2500);

        return redirect()->back();
    }
}
