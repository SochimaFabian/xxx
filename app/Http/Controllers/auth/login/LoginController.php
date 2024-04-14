<?php

namespace App\Http\Controllers\auth\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('auth.login.login');
    }

    public function auth(Request $request){
        // $profile = ;Auth::user()->profile
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($data)){
            if(Auth::user()->profile == null){
                return redirect(route('p.create'));
            }
            return redirect(route('home'));
        }else{
            return back()->with(['errors', 'Try again']);
        }

    }

}
