<?php

namespace App\Http\Controllers\admin\panel;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::with('product')->where('success', '0')->orderBy('id');
        if (\request()->filled('search')) {
            $comments = $comments->where('title', 'like', '%' . \request('search') . '%');
        }
        $comments = $comments->paginate(5);
        return view('panel.comments.check', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $products = Product::all();
        $comments = Comment::with('product')->where('success',1)->get();
        return view('panel.comments.create', compact('users', 'products', 'comments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Comment::create([
            'user_id' => $request['user_id'],
            'product_id' => $request['product_id'],
            'message' => $request['message'],
            'success' => 1,
        ]);
        alert()->success('tanks','insert your comment is success')->autoclose(2500);

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
        $comment = Comment::find($id);
        $comment->update([
            'user_id' => $request['user_id'],
            'product_id' => $request['product_id'],
            'message' => $request['message'],
            'success' => 1
        ]);
        alert()->success('tanks','update your comment is success')->autoclose(2500);

        return redirect(route('comment.create'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::find($id)->delete();
        alert()->success('tanks','delete your comment is success')->autoclose(2500);

        return redirect()->back();
    }
}
