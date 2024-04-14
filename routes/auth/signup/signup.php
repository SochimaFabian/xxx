<?php

    use App\Http\Controllers\auth\signup\SignUpController;
    use Illuminate\Support\Facades\Route;

    Route::get('/signup', [SignUpController::class, 'signup'])->name('signup')->middleware('guest');
    Route::post('/signup', [SignUpController::class, 'createUser'])->name('createUser');
