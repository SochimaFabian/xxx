<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PreventSelfFollow
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        $routeUser = $request->route('user');

        if ($routeUser->id == $user->id) {
            return redirect()->back()->with('error', 'You cannot follow yourself.');
        }

        return $next($request);}
}
