<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\OnlinequestionPaper;
use App\LearningcenterDetails;
use App\User;
use App\BecomeaTutor;
use App\TeachSubject;
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
            $LcDetails = LearningcenterDetails::where(['user_id' => $userId])->first();
        }
        $totalTutors = User::where(['user_type'=>3])->get();
        echo "<h1>Comming Soon<h1>";
        // return view('sites.site-index', [
        //     'LcDetails' => $LcDetails,
        //     'practicePaper'=>[],
        //     'totalTutors'=>$totalTutors,
        //     'Subjects'=> []
        // ]);
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

    public function termsOfService() {
        $LcDetails = [];
        if (Auth::check()) {
            $userId = getUser_Detail_ByParam('id');
            $LcDetails = LearningcenterDetails::where(['user_id' => $userId])->first();
        }
        return view('sites.termsOfService', ['LcDetails' => $LcDetails]);
    }

}
