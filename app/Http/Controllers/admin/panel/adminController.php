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

class adminController extends Controller
{
    public function storePic($file)
    {

        $now = Carbon::now();
        $month = $now->month;
        $year = $now->year;
        $location = "storage/uploadProduct/{$year}/{$month}/";
        $fileName = $file->getClientOriginalName($location);
        $file = $file->move($location, $fileName);
        $this->sizes($file, $location, $fileName);
        return $location . $fileName;
    }

    public function sizes($file, $location, $fileName)
    {

        $img = $location . $fileName;
        $image = Image::make($file);
        $image->resize(1000, 1358, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->save(public_path($img));
        $image->destroy($img);

    }


}
