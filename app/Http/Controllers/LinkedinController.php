<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

class LinkedinController extends Controller
{
    public function redirectToLinkedin() {
        return Socialite::driver('linkedin')->redirect();
    }

    public function handleLinkedinCallback() {
        try {
            $user = Socialite::driver('linkedin')->user();
            $finduser = User::where('linkedin_id', $user->id)->first();

            dd($user);
            if ($finduser) {
                Auth::login($finduser);
                return redirect('/home');
            } else {
                $newUser = User::create(['name' => $user->name, 'email' => $user->email, 'linkedin_id' => $user->id]);
                Auth::login($newUser);
                return redirect()->back();
            }
        } catch(Exception $e) {
            return redirect('auth/linkedin');
        }
    }
}
