<?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\user\home\IndexController;

Route::middleware(['auth', 'checkuserprofile'])->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('home');
});
