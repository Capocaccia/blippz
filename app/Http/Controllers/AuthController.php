<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{
    public function login() {

        $userData = array(
            'userName' => Input::get('username'),
            'password' => Input::get('password')
        );

        $user = User::where('userName', Input::get('username'))->first();

        if(Auth::attempt($userData)) {
            return response()->json(['result' => 'success', 'user' => $user, 'redirect' => 'home']);
        } else {
            return response()->json(['result' => 'error', 'msg' => 'Incorrect password.']);
        }

    }
}
