<?php

namespace App\Http\Controllers\site;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function commentStore(Request $request)
    {
        $comments = new Comment();
        if ($request->has('product_id')) {
            $comments->user_id = $request['user_id'];
            $comments->product_id = $request['product_id'];
            $comments->message = $request['message'];
            $comments->save();
        } else {
            $comments->user_id = $request['user_id'];
            $comments->message = $request['message'];
            $comments->question = 1;
            $comments->title = $request['title'];
            $comments->save();
        }
        alert()->message('با تشکر', 'پیام شما به درستی ثبت شد ')->persistent('بستن');
        return redirect()->back();
    }

    public function showComment()
    {
        $comments = Comment::where('question', '1')->where('success', '1')->get();
        if (\request()->filled('search')) {
            $pro = Product::orderBy('id');
            $products = $pro->where('name', 'like', '%' . \request('search') . '%');
            $products = $products->paginate(9);
            return view('home.allProduct', compact('products'));
        }
        return view('home.comment.create', compact('comments'));
    }
}
