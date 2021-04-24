<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class ExternalAuthController extends Controller
{
    /**
     * Redirect the user to Google Auth
     */
    public function redirectToGoogleLogin(Request $request) {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain login info from google
     */
    public function handleGoogleLoginResponse(Request $request) {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return Redirect::to('/login/google');
        }

        // Check if they're an existing user
        $existingUser = User::where('email', $user->email)->first();
    
        if($existingUser) {
            // Log them in
            Auth::login($existingUser, true);
        } else {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'email_verified_at' => now(),
                'password' => '' // passwords are irrelevant on this platform, the only login option is google login, which is secure
            ]);
    
            Auth::login($newUser, true);
        }
        return Redirect::to('/');
    }

    /**
     * After retrieving valid data from google
     * 
     */
    public function setGoogleLoginPassword()
    {

    }
}
