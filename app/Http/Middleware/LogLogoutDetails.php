<?php

namespace App\Http\Middleware;

use App\Models\LogoutDetail;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogLogoutDetails
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            LogoutDetail::create([
                'user_id' => auth()->id(),
                'location' => '',
                // 'location' => json_decode((new \GuzzleHttp\Client())->get("https://api.bigdatacloud.net/data/reverse-geocode-client?ip={$request->ip()}&localityLanguage=en")->getBody(), true)['countryName'],
                'logout_time' => now()
            ]);
        }
        return $next($request);
    }
}
