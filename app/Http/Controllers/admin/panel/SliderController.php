<?php

namespace App\Http\Controllers\admin\panel;

use App\galery;
use App\Http\Controllers\Controller;
use App\Product;
use App\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
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
        $sliders = Slider::with('product')->orderBy('created_at', 'desc');
        if (\request()->filled('search')) {
            $sliders = $sliders->where('name', 'like', '%' . \request('search') . '%');
        }
        $sliders = $sliders->paginate(5);
        return view('panel.slider.create', compact('products', 'sliders'));
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

        $location = "storage/uploadSlider/{$year}/{$month}/";
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();
            $image = $image->move($location,$fileName);
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(1920, 720);
            $image_resize->save(public_path($location . $fileName), 60);
            $fileName = $location . $fileName;
        }
        Slider::create([
            'product_id' => $request['product_id'],
            'name' => $request['name'],
            'title' => $request['title'],
            'description' => $request['description'],
            'coupon' => $request['coupon'],
            'image' => $fileName,

        ]);
        alert()->success('tanks', 'insert your slider is success')->autoclose(2500);

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
        $products = Product::all();
        $sliders = Slider::find($id);
        return view('panel.slider.edit', compact('sliders', 'products'));
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
        $now = Carbon::now();
        $month = $now->month;
        $year = $now->year;
        $location = "uploadSlider/{$year}/{$month}";
        if ($request->hasFile('image')) {
            $file = $request->file('image',null);
            $fileName = $file->getClientOriginalName();
            $img =Image::make($fileName->getRealyPath());
            $img->resize(200,200);
            $img->save($location.$fileName,30);
            $fileName = $location.$fileName;
        }

        $sliders = Slider::find($id);
        $sliders->update([
            'product_id' => $request['product_id'],
            'name' => $request['name'],
            'title' => $request['title'],
            'description' => $request['description'],
            'coupon' => $request['coupon'],
            'image' => $fileName,
        ]);
        alert()->success('tanks', 'update your slider is success')->autoclose(2500);

        return redirect(route('slider.create'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        if (!empty($slider->image)) {
            unlink($slider->image);
        }
        $slider->delete();
        alert()->success('tanks', 'delete your slider is success')->autoclose(2500);

        return redirect()->back();
    }
}
