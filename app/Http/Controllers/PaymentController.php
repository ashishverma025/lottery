<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth,
    DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Response;
use App\User;
use App\Betting;
use App\Quickbet;
use App\Plan;
use App\Subscription;
use App\Subscriber;

class PaymentController extends Controller {

    public function Payment(Request $request, $bId = null) {
        if (Auth::check()) {
            $input = $request->all();
            $userDetails = getUserDetails();
            $Betting = Betting::where(['id' => $bId])->first();

            $Subscriber = Subscriber::where(['user_id' => $userDetails['id']])->where('subscription_id', '!=', 1)->first();
            if (isset($Subscriber['subscription_id']) && !empty($Subscriber)) {
                $planExist = 'Yes';
            } else {
                $planExist = 'No';
            }
            return view('sites.payment', ['active' => 'subscribe','bettingDetails' => $Betting, 'planExist' => $planExist]);

            if (!empty($plans)) {
                if ($request->isMethod('get')) {
                    return view('sites-student.payment', ['active' => 'subscribe', 'bettingDetails' => $Betting, 'planExist' => $planExist]);
                }
            }
            return redirect('/');
        }
        return redirect('/');
    }

}
