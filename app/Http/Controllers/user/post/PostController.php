<?php

namespace App\Http\Controllers\user\post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create()
    {
        return view('user.post.create');
    }

    public function store(Request $request)
        {
            $data = $request->validate([
                'image' => 'required',
                'description' => 'required',
            ]);
            $image = $request->file('image');
            $fileName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('static/posts', $fileName, 'public');
            
            Post::create([
                'image' => 'storage/static/posts/' . $fileName,
                'user_id' => auth()->id(),
                'description' => $request->description
            ]);
            
            return redirect()->route('p.show', Auth::user()->username);
    }

        public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('user.post.show', compact('post'));
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if ($post->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }
        $post->delete();
        return redirect()->route('post.index')->with('success', 'Post deleted successfully.');
    }
}
