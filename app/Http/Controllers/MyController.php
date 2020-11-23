<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Routing\Controller as BaseController;
use App\User;
use Auth,
    DB,
    Hash,
    Session;

class MyController {

    public function check() {
        $userId = Auth::user()->id;
        $User = DB::table('users')->select('user_type')->where('id', '=', $userId)->first();
        if (isset($User->user_type) && !empty($User->user_type)) {
            if($User->user_type == 4){
                return redirect('/');
            }
            pr($User->user_type);
        }
    }

}
