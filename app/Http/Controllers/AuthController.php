<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{
    public function login() {

        $userData = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );

        $user = User::where('email', Input::get('email'))->first();

        if(Auth::attempt($userData)) {
            return response()->json(['result' => 'success', 'user' => $user, 'redirect' => 'home']);
        } else {
            return response()->json(['result' => 'error', 'msg' => 'Incorrect password.']);
        }

    }
}
