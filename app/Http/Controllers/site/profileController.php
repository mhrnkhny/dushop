<?php

namespace App\Http\Controllers\site;

use App\Address;
use App\Http\Controllers\Controller;
use App\Http\Requests\InfoRequest;
use App\payment;
use App\Phone;
use App\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class profileController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }




    public function profile()
    {
        $phones = Phone::where('user_id', auth()->user()->id)->get();
        $addresses = Address::where('user_id', auth()->user()->id)->get();
        $payments = payment::orderBy('id')->where('user_id', function ($query) {
            $user = auth()->user()->id;
            $query->select('user_id')->from('payments')->where('user_id', $user)->groupBy('user_id');
        })->get();
        if (\request()->filled('search')) {
            $pro = Product::orderBy('id');
            $products = $pro->where('name', 'like', '%' . \request('search') . '%');
            $products = $products->paginate(9);
            return view('home.allProduct',compact('products'));
        }
        return view('home.profile.view', compact('phones', 'addresses','payments'));
    }




    public function Information()
    {
        return view('home.profile.create');
    }



    public function editProdfile()
    {
        return view('home.profile.edit');
    }



    public function storeInfo(InfoRequest $request)
    {
        $phones = new Phone();
        if (\request()->filled('number')) {

            $phones->number = $request['number'];
            $phones->user_id = $request['user_id'];
            $phones->save();
        }

        $addresses = new Address();
        if (\request()->filled('address')) {
            $addresses->address = $request['address'];
            $addresses->user_id = $request['user_id'];
            $addresses->save();
        }
        if ($request->filled('postal_code')) {
            $addresses->postal_code = $request['postal_code'];
            $addresses->user_id = $request['user_id'];
            $addresses->address = $request['address'];
            $addresses->save();
        }
        alert()->message('با تشکر', 'اضافه کردن اطلاعات شما به درستی ثبت شد')->autoclose(1000);

        return redirect(route('profile'));
    }




    public function updateInfo(InfoRequest $request, $id)
    {
        $users = User::find($id);
        $now = Carbon::now();
        $year = $now->year;
        $month = $now->month;
        $location = "storage/uploadUserImage/{$year}/{$month}";
        if (request()->hasFile('image')) {
            $file = $request->file('image');
            $img = $file->getClientOriginalName();
            $image = Image::make($img->getRealypath());
            $image->resize(200,200);
            $image->save($location.$img,30);
            $img = $location.$img;
        }

        $users->update([
            'firstName' => $request['firstName'],
            'lastName' => $request['lastName'],
            'email' => $request['email'],
            'national_code' => $request['national_code'],
            'role' => 'user',
            'image' => $img,
        ]);
        alert()->message('با تشکر', ' ویرایش شما به درستی ثبت شد')->autoclose(1000);

        return redirect(route('profile'));
    }
}
