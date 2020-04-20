<?php

namespace App\Http\Middleware;

use App\Address;
use App\Phone;
use Closure;

class CheckPhone
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $phone = Phone::where('user_id',auth()->user()->id)->first();
        $address = Address::where('user_id',auth()->user()->id)->first();
        if (auth()->check()) {
            if (auth()->user()) {
                if (!empty($phone->number) && !empty($address->address)){
                    return $next($request);
                }
                else{
                    return redirect(route('Info'));
                }
            }
        }
    }
}
