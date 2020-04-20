<?php

namespace App\Http\Controllers\admin\panel;

use App\Address;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Users = User::with('phone')->orderBy('id');
        if (\request()->filled('search')) {
            $Users = User::where('firstName', 'like', '%' . \request('search') . '%');
        }
        $Users = $Users->paginate(10);
        return view('panel.Users.index', compact('Users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.Users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $now = Carbon::now();
        $year = $now->year;
        $month = $now->month;
        $location = "storage/uploadUserImage/{$year}/{$month}/";
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $fileName = $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(100, 100);
            $image_resize->save(public_path($location . $fileName), 60);
            $fileName = $location . $fileName;
        }

            User::create([
                'firstName' => $request['firstName'],
                'lastName' => $request['lastName'],
                'email' => $request['email'],
                'role' => $request['role'],
                'image' => $fileName,
                'national_code' => $request['national_code'],
                'password' => Hash::make(\request('password')),
            ]);




        alert()->success('tanks', 'insert your user is success')->autoclose(2500);

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
        $users = User::find($id);
        return view('panel.Users.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        global $location;
        if ($request->hasFile('photo')) {
            $patch = \request()->file('photo')->store($location, 'public');
            $patch = 'storage/' . $patch;
        } else {
            $patch = null;
        }
        $users = User::find($id);
        $users->update([
            'firstName' => $request['firstName'],
            'lastName' => $request['lastName'],
            'email' => $request['email'],
            'role' => $request['role'],
            'image' => $patch,
            'national_code' => $request['national_code'],
            'password' => Hash::make(\request('password')),

        ]);

        alert()->success('tanks', 'update your user is success')->autoclose(2500);

        return redirect(route('user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (!empty($user->image)) {
            unlink($user->image);
        }
        $user->delete();
        alert()->success('tanks', 'delete your user is success')->autoclose(2500);
        return redirect()->back();
    }
}
