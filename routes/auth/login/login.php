<?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\auth\login\LoginController;
    use App\Http\Controllers\auth\LogoutController;

    Route::get('/user/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
    Route::post('/user/login', [LoginController::class, 'auth'])->name('auth');
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout')->middleware(['auth', 'log.logout.details']);
