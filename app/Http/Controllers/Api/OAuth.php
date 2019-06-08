<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class OAuth extends Controller
{
    /**
     * Register
     */
    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->auth_token =Hash::make(md5(time()));
        $user->password = Hash::make($request['password']);

        $user->save();

        return $user;
    }
}
