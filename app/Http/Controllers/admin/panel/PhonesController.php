<?php

namespace App\Http\Controllers\admin\panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhoneRequest;
use App\Phone;
use App\User;
use Illuminate\Http\Request;
use test\Mockery\ReturnTypeObjectTypeHint;

class PhonesController extends Controller
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
        $phones = Phone::with('user')->orderBy('id');
        $users = User::all();
        if (\request()->filled('search')) {
            $phones = $phones->where('number', 'like', '%' . \request('search') . '%');
        }
        $phones = $phones->paginate(5);
        return view('panel.Users.phons.create', compact('users', 'phones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhoneRequest $request)
    {
        Phone::create([
            'user_id' => $request['user_id'],
            'number' => $request['number'],
        ]);
        alert()->success('tanks','insert your phone is success')->autoclose(2500);

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
        $users = User::all();
        $phones = Phone::find($id);
        return view('panel.Users.phons.edit', compact('phones', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhoneRequest $request, $id)
    {
        $phones = Phone::find($id);
        $phones->update([
            'user_id' => $request['user_id'],
            'number' => $request['number'],
        ]);
        alert()->success('tanks','update your phone is success')->autoclose(2500);

        return redirect(route('phones.create'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Phone::find($id)->delete();
        alert()->success('tanks','delete your phone is success')->autoclose(2500);

        return redirect()->back();
    }
}
