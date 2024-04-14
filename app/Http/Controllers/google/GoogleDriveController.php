<?php

namespace App\Http\Controllers\google;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GoogleDriveController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function upload(Request $request){
        dd($request->all());
    }
}
