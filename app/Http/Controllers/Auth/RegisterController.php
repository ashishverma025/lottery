<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Register Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users as well as their
      | validation and creation. By default this controller uses a trait to
      | provide this functionality without requiring any additional code.
      |
     */

use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'fname' => ['required', 'string', 'max:255'],
                    'lname' => ['required', 'string', 'max:255'],
//                    'city' => ['required', 'string', 'max:255'],
//                    'state' => ['required', 'string', 'max:255'],
//                    'country' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'dob' => ['required', 'string',  'max:255'],
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data) {
        // prd($data);
        return User::create([
                    'fname' => $data['fname'],
                    'lname' => $data['lname'],
                    'name' => $data['fname'] . ' ' . $data['lname'],
                    'email' => $data['email'],
                    'address' => @$data['address'],
                    'city' => @$data['city'],
                    'state' => @$data['state'],
                    'country' => @$data['country'],
                    'dob' => @$data['dob'],
                    'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request) {
        $postData = $request->all();
//        prd($postData);
        $email = $postData['email'];
        $isExist = is_email_exist($email);
        if ($isExist['status'] == 'exist') {
            $res['resCode'] = 1;
            $res['resMsg'] = 'This email has already been taken';
            return $res;
        }
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        $this->guard()->login($user);
        $res['resCode'] = 0;
        $res['resMsg'] = 'Congratulations ! you have registered successfully';
        return $res;
    }
    
    
    ///////////////////////////////// SEAMO API REGISTRATION //////////////////////////////////////////
    
    protected function semovalidator(array $data) {
        // prd($data);
        // return Validator::make($data, [
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);
    }
    
    protected function seamocreate(array $data) {
        return User::create([
            'email' => $data['email'],
            'email_verified_at' => date('Y-m-d h:i:s'),
            'password' => Hash::make($data['password']),
        ]);
    }

    public function seomoUserRegister(Request $request) {
        $userData = $request->all();
        $email = $userData['email'];
        $isExist = is_email_exist($email);

        // if ($isExist['status'] == 'exist') {
        //     $res['resCode'] = 1;
        //     $res['resMsg'] = 'This email has already been taken';
        //     return $res;
        // }

        // $this->semovalidator($request->all())->validate();
        // prd($isExist);

        // event(new Registered($user = $this->seamocreate($request->all())));
        // $this->guard()->login($user);
        $password = $userData['password'];
        return redirect("/seomoUserLogin?email=$email&password=$password&remember=no");
    }

}
