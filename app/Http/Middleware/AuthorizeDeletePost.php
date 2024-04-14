<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;
use Illuminate\Http\Request;

class AuthorizeDeletePost
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
        $postId = $request->route('post');
        dd($postId);
        $post = Post::findOrFail($postId);
        if ($post->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }
        return $next($request);
    }
}
