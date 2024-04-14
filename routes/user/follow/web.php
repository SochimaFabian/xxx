<?php

namespace App\Http\Controllers\user\follow;
use Illuminate\Support\Facades\Route;


    Route::middleware(['auth', 'prevent.self.follow'])->prefix('/users/{user}')->group(function () {
        Route::post('/follow', [FollowController::class, 'follow'])->name('user.follow');
        Route::post('/unfollow', [FollowController::class, 'unfollow'])->name('user.unfollow');
    });
