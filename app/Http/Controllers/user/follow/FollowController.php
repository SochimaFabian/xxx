<?php

namespace App\Http\Controllers\user\follow;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Overtrue\LaravelFollow\Traits\Follower;
use Overtrue\LaravelFollow\Traits\CanFollow;
use Overtrue\LaravelFollow\Traits\CanBeFollowed;

class FollowController extends Controller
{
    public function follow(User $user){   
        auth()->user()->follow($user);
        return back()->with('success', 'You are now following ' . $user->name);
   }
    public function unfollow(User $user){
        auth()->user()->unfollow($user);

        return back()->with('success', 'You have unfollowed ' . $user->name);
    }
    
}
