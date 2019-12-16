<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;

class JWTAuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $sess_token = Session::get('jwt_token');
        if(empty($sess_token)){
            return redirect('/admin')->with('status_error', 'Please Login!');
        };
        //check token
        try {
            $data = JWTAuth::authenticate($sess_token);
        } catch (TokenBlacklistedException $e) {
            // return redirect($refer)->with('status_error', 'token blacklist!');
            return redirect('admin')->with('status_error', 'You are logged out!');
        } catch (TokenInvalidException $e) {
            // return redirect('login')->with('status_error', 'token invalid!');
            return redirect('admin')->with('status_error', 'Session invalid!');
        } catch (TokenExpiredException $e) {
            // return redirect('login')->with('status_error', 'token expired!');
            return redirect('admin')->with('status_error', 'Session expired!');
        }
        return $next($request);
    }


}
