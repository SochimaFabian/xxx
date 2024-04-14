<?php

    use App\Http\Controllers\user\profile\ProfileController;
    use Illuminate\Support\Facades\Route;

    Route::middleware(['auth'])->group(function () {
        Route::resource('p', ProfileController::class);
    });




