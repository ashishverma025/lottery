<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Socialite;
use Auth;
use Exception;

class SocialAuthGoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $existUser = User::where('email',$googleUser->email)->first();
            
            if($existUser) {
                Auth::loginUsingId($existUser->id);
            } else {
                $user = new User;
                $user->name   = $googleUser->name;
                $user->email  = $googleUser->email;
                $user->email  = $googleUser->email;

                $user->email_verified_at = date('Y-m-d H:i:s');
                
                $user->avatar = $googleUser->avatar;
                $user->social_login_token = $googleUser->token;
                $user->social_login_id    = $googleUser->id;
                $user->social_login_type  = 'google';
                $user->password  = \Hash::make('12345678');
                $user->save();
                Auth::loginUsingId($user->id);
            }
            return redirect()->to('/home');
        } 
        catch (Exception $e) {
            // echo $e; 
            // echo "<pre>"; print_r($e->getMessage()); exit; 
        }
    }
}
