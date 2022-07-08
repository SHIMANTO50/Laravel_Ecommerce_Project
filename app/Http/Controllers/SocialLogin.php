<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLogin extends Controller
{
    public function gogglegoto()
    {
        return Socialite::driver('google')->redirect();
    }

    public function goggleinfostore()
    {

        $socialData = Socialite::driver('google')->user();
        // dd($socialData);
        $userFind = User::where('socialid', $socialData->id)->first();
        if ($userFind) {
            Auth::login($userFind);
            return redirect()->intended(RouteServiceProvider::HOME);
        } else {
            $user = new User();
            $user->fname = 'Google User';
            $user->name = $socialData->name;
            $user->email = $socialData->email;
            $user->role = '3';
            $user->socialid = $socialData->id;
            $user->password = encrypt($socialData->email);
            $user->save();
            Auth::login($userFind);
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }
}
