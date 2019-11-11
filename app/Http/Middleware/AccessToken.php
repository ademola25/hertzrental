<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Controllers\Functions;


class AccessToken
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
        $cookie = isset($_COOKIE['access_token']) ? $_COOKIE['access_token'] : null;
        if(!$cookie){
             return redirect('/');
        }
        $b = new Functions();
        $success = $b::checkAccess($cookie);
        $data = $success->getData();
      //dd($data->token);
        if($data->token == null){
             return redirect('/');
        }
        return $next($request);
    }
}
