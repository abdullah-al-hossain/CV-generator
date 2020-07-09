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
        if (Auth::user()->is_admin == 1) {
            //dd(Auth::user());
            return $next($request);
        }

        return redirect('/');
      } else {
        return redirect()->route('admin.login');
      }

    }
}
