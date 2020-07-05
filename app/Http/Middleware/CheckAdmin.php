<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Auth;

class CheckAdmin
{
    public function handle($request, Closure $next)
    {
      if(Auth::check()){
        if (Auth::user()->is_admin) {
            //dd(Auth::user());
            return $next($request);
        }

        return redirect()->route('home');
      } else {
        return redirect()->route('admin.login');
      }

    }
}
