<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth,
    DB;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function checkMD() {
        dd('checkMD');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        if (Auth::check()) {
            $uType = getUser_Detail_ByParam('user_type');
            if ($uType == 4) {
                return redirect('uses/dashboard');
            } else {
                return redirect('user-dashboard');
            }
        }
        return view('home');
    }

}
