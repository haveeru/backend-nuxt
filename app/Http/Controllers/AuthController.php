<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request){
        //validate user
        $this->validate($request, [
            'email' => 'email|required|unique:users,email',
            'name' => 'required',
            'password' => 'required|min:6'
        ]);

        //create user
        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->password),
        ]);

        return $user;
    }
}
