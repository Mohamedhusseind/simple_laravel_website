<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Psy\Util\Str;

class SocialController extends Controller
{
    public function redirect($service)
    {
        return Socialite::driver($service)->redirect();
    }
    public function callback($service,Request $request)
    {
        $user = Socialite::driver($service) ->stateless()-> user() ;
        $user = User::firstOrCreate([
            'email'=>$user->email
        ], [
             'name'=>$user->name,
              'password'=> Hash::make(base_path())
            ]);
        Auth::login($user,true);

        return view('home');
    }
}
