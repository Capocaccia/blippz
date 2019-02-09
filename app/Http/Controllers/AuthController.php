<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {

        $userData = array(
            'userName' => Input::get('username'),
            'password' => Input::get('password')
        );

        if(Auth::attempt($userData)) {
            return response()->json(['result' => 'success', 'redirect' => 'home']);
        } else {
            return response()->json(['result' => 'error', 'msg' => 'Incorrect password.']);
        }

    }
}
