<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth,
    DB;



class AddFundController extends Controller {

    public function addFund() {
        if (Auth::check()) {
         
        }
		    return view('sites.addfund');
        return redirect('/');
    }

}
