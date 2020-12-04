<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Response;
use App\User;

class LoginController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles authenticating users for the application and
      | redirecting them to your home screen. The controller uses a trait
      | to conveniently provide its functionality to your applications.
      |
     */

use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/home';
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the login form.
     * 
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm() {
        return view('auth.login', [
            'title' => 'User Login',
            'loginRoute' => 'login',
            'forgotPasswordRoute' => 'password.request',
        ]);
    }

    protected function username() {
        return 'email';
    }

    public function signIn(Request $request) {
        $credentials = $request->only($this->username(), 'password');
        $authSuccess = Auth::attempt($credentials, $request->has('remember'));
        // prd($credentials);

        if ($authSuccess) {
            $request->session()->regenerate();
            set_flash_message('You have login successfully', 'alert-success');
            return response(['success' => true, 'message' => 'You have login successfully.']);
        }

        return response([
            'success' => false,
            'message' => 'These credentials do not match our records.'
        ]);
    }

    //////////////////////////////////////////// SEMO LOGIN API //////////////////////////////////////////////////////////

    public function seomoUserLogin(Request $request) {
        if (!empty($request->all())) {
            $data = $request->all();

            if (isset($data['pId']) && isset($data['email']) && !empty($data['pId'])) {
                if (empty(@$data['password'])) {
                    $data['password'] = 12345678;
                }
                // prd($data);
                $paperId = $data['pId'];
                $isUserExist = is_email_exist($data['email']);
                if ($isUserExist['status'] == 'exist') {
                    // prd($isUserExist);

                    $credentials = ['email' => $data['email'], 'password' => $data['password']];
                    $authSuccess = Auth::attempt($credentials, $request->has('remember'));
                    if ($authSuccess) {
                        $request->session()->regenerate();
                        if (!empty($paperId)) {
                            return redirect("/onlinePractice/$paperId");
                        } else {
                            return redirect("/onlinePractice");
                        }
                    }
                }else {
                    $user = new User;
                    $user->email = $email = $data['email'];
                    $user->password = Hash::make($data['password']);
                    $user->email_verified_at = date('Y-m-d h:i:s');
                    $user->save();
                    $pwd = $data['password'];
                    // prd($data);
                    return redirect("/seomoUserLogin?email=$email&password=$pwd&remember=no&pId=$paperId");
                }
            } else {
                return response([
                    'success' => false,
                    'message' => 'These credentials do not match our records.'
                ]);
            }
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/')->with('status', 'User has been logged out!');
    }

}
