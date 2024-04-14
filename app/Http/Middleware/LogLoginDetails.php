<?php

namespace App\Http\Middleware;
use App\Models\LoginDetail;
use App\Models\User;
use Closure;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogLoginDetails
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
        $user = User::where('email', $request->email)->firstOrFail();
        LoginDetail::create([
            'user_id' => $user->id,
            'location' => '',
            'location' => json_decode((new \GuzzleHttp\Client())->get("https://api.bigdatacloud.net/data/reverse-geocode-client?ip={$request->ip()}&localityLanguage=en")->getBody(), true)['countryName'],
            'login_time' => now()
        ]);
        return $next($request);
    }
}
