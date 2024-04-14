<?php

    use App\Http\Controllers\admin\AdminController;
    use Illuminate\Support\Facades\Route;

    Route::get('admin',  [AdminController::class, 'admin'])->middleware('checkadmin');
