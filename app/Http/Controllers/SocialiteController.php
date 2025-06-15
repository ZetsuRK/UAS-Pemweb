<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    // GOOGLE
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        return $this->loginOrCreateAccount($googleUser, 'google');
    }

    // GITHUB
    public function redirectToGitHub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGitHubCallback()
    {
        $gitHubUser = Socialite::driver('github')->stateless()->user();
        return $this->loginOrCreateAccount($gitHubUser, 'github');
    }

    // MICROSOFT
    public function redirectToMicrosoft()
    {
        return Socialite::driver('microsoft')->redirect();
    }

    public function handleMicrosoftCallback()
    {
        $msUser = Socialite::driver('microsoft')->stateless()->user();
        return $this->loginOrCreateAccount($msUser, 'microsoft');
    }

    private function loginOrCreateAccount($providerUser, $provider)
    {
        $user = User::updateOrCreate(
            ['email' => $providerUser->getEmail()],
            [
                'name' => $providerUser->getName() ?? $providerUser->getNickname(),
                'email_verified_at' => now(),
            ]
        );

        Auth::login($user, true);
        return redirect('/dashboard');
    }
}
