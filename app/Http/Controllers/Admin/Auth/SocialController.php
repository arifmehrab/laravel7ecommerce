<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Socialite;
use App\User;
class SocialController extends Controller
{
    // Github redirect To prodvere 
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

}
