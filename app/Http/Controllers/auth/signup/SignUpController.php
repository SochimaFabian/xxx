<?php

namespace App\Http\Controllers\auth\signup;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignUpController extends Controller
{
    public function signup(){
        return view('auth.signup.signup');
    }

    public function createUser(Request $request){
        $data = $request->validate([
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|min:5'
        ]);

        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        Auth::login($user);
        return redirect(route('p.create'));

    }

}
