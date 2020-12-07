<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Betting;
use Auth,
    DB;

class WelcomeController extends Controller {

    public function __construct() {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function landing_index() {
//        prd($_GET);
        $LcDetails = [];

        if (Auth::check()) {
            $userId = getUser_Detail_ByParam('id');
        }
        return view('sites.site-index');
    }

    public function index1() {
//        prd($_GET);
        $LcDetails = [];
        if (Auth::check()) {
            $userId = getUser_Detail_ByParam('id');
            $LcDetails = LearningcenterDetails::where(['user_id' => $userId])->first();
        }
        return view('sites.site-index1', ['LcDetails' => $LcDetails]);
    }

    public function bet(Request $request, $betId = null) {
        $LcDetails = [];
        if (Auth::check()) {
            $userId = getUser_Detail_ByParam('id');
            $bettingDetails = Betting::where(['id' => $betId, 'status' => 'Active'])->get()->first();
//            pr($bettingDetails);
            return view('sites.bet', [
                'bettingDetails' => $bettingDetails ? $bettingDetails : [],
            ]);
        }
        return redirect('/');
    }

    public function betList() {
        $bettingDetails = Betting::where(['status' => 'Active'])->get();
        return view('sites.bet-list', [
            'bettingDetails' => $bettingDetails ? $bettingDetails : [],
        ]);
    }

    public function rate_saler() {

        $user = DB::table('users')->where('id', 7)->first();
        //echo "<pre>"; print_r($user->id); die;
        return view('ratesaller', compact('user'));
    }

    public function privacyPolicy() {
        $LcDetails = [];
        if (Auth::check()) {
            $userId = getUser_Detail_ByParam('id');
            $LcDetails = LearningcenterDetails::where(['user_id' => $userId])->first();
        }
        return view('sites.privacyPolicy', ['LcDetails' => $LcDetails]);
    }

}
