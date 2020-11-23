<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Socialite;
use Auth;
use Exception;


class SocialAuthFacebookController extends Controller
{
   /**
   * Create a redirect method to facebook api.
   *
   * @return void
   */
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback()
    {

    	try {

		 	$facebookUser = Socialite::driver('facebook')->user();
            $existUser = User::where('email',$facebookUser->email)->first();

    		if($existUser) {
                Auth::loginUsingId($existUser->id);
            } else {
                $user = new User;
                $user->name   = $facebookUser->name;
                $user->email  = $facebookUser->email;
                $user->avatar = $facebookUser->avatar;
				
                $user->email_verified_at   = date('Y-m-d H:i:s');
				
                $user->social_login_token  = $facebookUser->token;
                $user->social_login_id     = $facebookUser->id;
                $user->social_login_type   = 'facebook';
                $user->user_type   = 4;
                $user->password  = \Hash::make('12345678');
                $user->save();
                Auth::loginUsingId($user->id);
            }
            return redirect()->to('/home');
    		
    	} catch (Exception $e) {
    		echo $e; 
    	}
    }
}
