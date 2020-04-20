<?php

namespace App\Http\Controllers\admin\panel;

use App\Address;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\User;
use Illuminate\Http\Request;
use test\Mockery\ReturnTypeObjectTypeHint;

class AddressController extends Controller
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
        $users = User::all();
        $addresses = Address::with('user')->orderBy('id');
        if (\request()->filled('search')) {
            $addresses = $addresses->where('address', 'like', '%' . \request('search') . '%');
        }
        $addresses = $addresses->paginate(5);
        return view('panel.Users.address.create', compact('users', 'addresses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddressRequest $request)
    {
        Address::create([
            'user_id' => $request['user_id'],
            'address' => $request['address'],
            'postal_code' => $request['postal_code'],
        ]);
        alert()->success('tanks', 'insert your address is success')->autoclose(2500);

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
        $addresses = Address::find($id);
        $users = User::all();
        return view('panel.Users.address.edit', compact('addresses', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddressRequest $request, $id)
    {
        $address = Address::find($id);
        $address->update([
            'user_id' => $request['user_id'],
            'address' => $request['address'],
            'postal_code' => $request['postal_code'],
        ]);
        alert()->success('tanks', 'update your address is success')->autoclose(2500);

        return redirect(route('address.create'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Address::find($id)->delete();
        alert()->success('tanks', 'delete your address is success')->autoclose(2500);

        return redirect()->back();
    }
}
