<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Session;
use App\Models\User;

class AuthenticationController extends Controller
{
  public function __construct()
  {
    $this->middleware('jwt.check')->only('dologout');    
  }
    public function login()
    {
        return view('admin');
        // return 'oke';
    }
    public function dologin(Request $request)
    {
       $request->validate([
           'email'=>'required|email',
           'password'=>'required',
       ]);
    
       $credentials = $request->only('email', 'password');
       $token = NULL;
       try {
           $token = JWTAuth::attempt($credentials);
         // return $token;
         if (!$token) {
           return redirect('admin')->with('status_error', 'Login Failed!');
         }
       } catch (\Exception $e) {
         return redirect('admin')->with('status_error', 'Could not create token!');
       }

       $user = JWTAuth::toUser($token);
       $data_user = User::where('idusers',$user->idusers)->first();
        $session_user = [
            'name' => $data_user->name,
            'role' => $data_user->role,
            'email' => $data_user->email,
        ];
    //    return $session_user;
       Session::put('jwt_token',$token);
       Session::put('jwt_user',$session_user);
       return redirect('/home');
    //    $gettoken = Session::get('jwt_token');
    //    return $gettoken;
    }

    public function dologout()
    {
      //get token
      $token = Session::get('jwt_token');
      //invalidate token
      JWTAuth::invalidate($token);
      Session::flush();
      return redirect('/admin');
 
    }
}
