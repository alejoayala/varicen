<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;

class AuthenticateController extends Controller
{
  //Trait
  use AuthenticatesUsers;

  // public function login(Request $request) {
  //   $this->validate($request, [
  //     /*'email' => 'required|string|email|max:255',*/
  //     'name'  => 'required|string|max:255',
  //     'password' => 'required|string|min:6'
  //   ]);
  //   //$credentials = $request->only('name', 'password');

  //   if (Auth::attempt(['name' => $request->name, 'password' => $request->password, 'active' => 1])) {
  //     $user = Auth::user();
  //     return response()->json(["logging" => 1 , "user" => $user]);    
  //   }

  //   return response()->json(['logging' => 0 , 'error' => 'User and/or password are incorrect!'], 401);
    
  // }

  //funcion de login username
   public function username()
   {
       return 'name';
   }

  public function register(Request $request) {
    $this->validate($request, [
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|min:6',
    ]);

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => bcrypt($request->password),
    ]);
    $token = JWTAuth::fromUser($user);

    return response()->json(["token" => $token, "user" => $user]);
  }

  public function logout() {
    Auth::logout();
    //$token = JWTAuth::getToken();
    //JWTAuth::invalidate($token);
  }

  public function refreshToken() {
    try {
        $token = JWTAuth::getToken();
        $new_token = JWTAuth::refresh($token);

        return response()->json(["token" => $new_token]);
    }catch(TokenExpiredException $e){
        return response()->json(["token" => "invalid_token"]);
    }

  }
}
