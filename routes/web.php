<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetLocationController;
use App\Http\Controllers\google\GoogleDriveController;
use App\Http\Controllers\user\follow\FollowController;

require 'user/follow/web.php';
require 'auth/signup/signup.php';
require 'auth/login/login.php';
require 'user/home/home.php';
require 'test.php';
require 'user/profile/profile.php';
require 'user/post/post.php';
require 'admin/admin.php';

Route::get('show_data/{id}', [GetLocationController::class, 'getlocation']);

Route::get('/google', [GoogleDriveController::class, 'index']);
Route::post('/google/upload', [GoogleDriveController::class, 'upload']);
