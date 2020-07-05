<?php

namespace App\Http\Controllers;

use Socialite;
use Illuminate\Http\Request;
use App\Services\SocialAuthService;

class SocialAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback(SocialAuthService $service)
    {
      //dd(Socialite::driver('facebook')->user());
    	$user = $service->createOrGetUser(Socialite::driver('facebook')->user());
    	auth()->login($user);

        return redirect()->to('/home');
    }

  
}
