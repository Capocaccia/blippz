<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserAdminController extends Controller
{
    public function save_user(Request $request) {
        $user = new User;
        $user->fill($request->all());
        $password = $request->password;
        $user->password = Hash::make($password);
        $user->save();
        return response()->json(['result' => 'success', 'user' => $user, 'redirect' => 'home']);
    }

}
