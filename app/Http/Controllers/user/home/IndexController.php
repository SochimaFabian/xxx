<?php

namespace App\Http\Controllers\user\home;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(){
        $count = User::count();
        // $randomId = [rand(1, $count), rand(1, $count), rand(1, $count), rand(1, $count), rand(1, $count)];
        return view('user.home.index', [
            'user' => Auth::user(),
            'posts' => Post::orderBy('created_at', 'desc')->paginate(12)
            // 'randomId' => $randomId
        ]);
    }

    public function randomUser($user){
        dd($user);
    }


}
