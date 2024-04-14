<?php

use App\Http\Controllers\FileUploadController;
use Illuminate\Support\Facades\Route;

// use Illuminate\Routing\Route;

    Route::get('file/upload', [FileUploadController::class, 'file']);
    Route::post('upload', [FileUploadController::class, 'upload'])->name('upload');
