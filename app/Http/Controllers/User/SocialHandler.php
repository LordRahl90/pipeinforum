<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Laravel\Socialite\Facades\Socialite;

class SocialHandler extends Controller
{

    function gotoFacebook(){
        return Socialite::driver('facebook')->redirect();
    }


    function facebookRegistration(){
        $user=Socialite::driver('facebook')->user();
        dd($user);
    }
}
