<?php

namespace App\Http\Controllers\site;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Like;
use App\Product;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function Like(Request $request, $id)
    {
            Like::create([
                'user_id' => auth()->user()->id,
                'product_id' => $id,
            ]);

        alert()->message('با تشکر', 'لایک شما ثبت شد')->autoclose(3000);
        return redirect()->back();
    }

    public function DisLike($id)
    {
            $disLike = Like::with('product')->where('product_id', $id)->where('user_id', auth()->user()->id)->first();
            $disLike->delete();
        return redirect()->back();
    }
}
