<?php

    use App\Http\Controllers\user\post\PostController;
    use Illuminate\Support\Facades\Route;

    Route::middleware(['auth', 'checkuserprofile'])->group(function () {
        Route::resource('post', PostController::class);

        Route::delete('post/{post}', [PostController::class, 'destroy'])
            ->middleware(['authorize.delete.post'])
            ->name('post.destroy');
    });
