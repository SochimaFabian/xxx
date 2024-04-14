<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function file(){
        return view('file');
    }

    public function upload(Request $request){
        $photo  = $request->file;
        dd($photo);
    }
}
