<?php
//php artisan make:controller AuthController
namespace App\Http\Controllers;
use App\Http\Requests\UserRgisterRequest;
use App\User;
//use Illuminate\Http\Request;
use App\Http\Resources\User as UserResources;


class AuthController extends Controller
{
    public function register(UserRgisterRequest $request){

        //create user
        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->password),
        ]);

        return new UserResources ($user);
    }
}
