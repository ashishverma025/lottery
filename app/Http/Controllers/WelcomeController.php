<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Betting;
use App\Quickbet;
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
        $betListDetail = Betting::where(['status' => 'Active'])->limit(3)->orderBy('id', 'DESC')->get()->toArray();

        return view('sites.site-index', ['betListDetail' => $betListDetail]);
    }

    public function myAccount() {
        if (Auth::check()) {
            $userId = getUser_Detail_ByParam('id');

            $QuickbetRecords = DB::table('quickbets as qb')->select('qb.*', 'u.name as UserName', 'b.id as matchNumbers', 'b.bet_description', 'b.bet_name', 'b.winning_number', 'b.num1 as ANum1', 'b.num2 as ANum2', 'b.num3 as ANum3', 'b.num4 as ANum4', 'b.num5 as ANum5')
                    ->leftJoin('users as u', 'u.id', 'qb.user_id')
                    ->leftJoin('bettings as b', 'b.id', 'qb.bet_id')
                    ->where('qb.status', 'Active')
                    ->where('qb.user_id', $userId)
                    ->orderBy('qb.id', 'DESC')
                    ->get();
            foreach ($QuickbetRecords as $key => $qRecords) {
                $quickNumbers = [$qRecords->num1, $qRecords->num2, $qRecords->num3, $qRecords->num4, $qRecords->num5];
                $announcedNumbers = [$qRecords->ANum1, $qRecords->ANum2, $qRecords->ANum3, $qRecords->ANum4, $qRecords->ANum5];
                if (!empty($qRecords->ANum1) && !empty($qRecords->ANum1) && !empty($qRecords->ANum1) && !empty($qRecords->ANum1) && !empty($qRecords->ANum1)) {
                    $numberMatch = array_intersect($quickNumbers, $announcedNumbers);
                    if (!empty($numberMatch)) {
                        $QuickbetRecords[$key]->matchNumbers = implode(',', $numberMatch);
                    } else {
                        $QuickbetRecords[$key]->matchNumbers = 'Not matched';
                    }
                } else {
                    $QuickbetRecords[$key]->matchNumbers = 'N/A';
                }
            }

            $TransactionHistory = DB::table('payments as p')->select('p.*', 'u.name as UserName', 'b.bet_name')
                    ->leftJoin('users as u', 'u.id', 'p.user_id')
                    ->leftJoin('bettings as b', 'b.id', 'p.bet_id')
                    ->where('p.user_id', $userId)->orderBy('p.id', 'DESC')
                    ->get();
//            prd($TransactionHistory);

            return view('sites.myAccount', [
                'QuickbetRecords' => $QuickbetRecords ? $QuickbetRecords : [],
                'TransactionHistory' => $TransactionHistory ? $TransactionHistory : [],
            ]);
        }
        return redirect('/');
    }

    public function bet(Request $request, $betId = null) {
        $LcDetails = [];
        if (Auth::check()) {
            $userId = getUser_Detail_ByParam('id');
            $bettingDetails = Betting::where(['id' => $betId, 'status' => 'Active'])->get()->first();
            return view('sites.bet', [
                'bettingDetails' => $bettingDetails ? $bettingDetails : [],
            ]);
        }
        return redirect('/');
    }

    public function betList() {
        if (Auth::check()) {
            $bettingDetails = Betting::where(['status' => 'Active'])->get()->toArray();
            return view('sites.betting-list', [
                'bettingDetails' => $bettingDetails ? $bettingDetails : [],
            ]);
        }
        return redirect('/');
    }

    public function betRecord() {
        if (Auth::check()) {
            $userDetails = getUserDetails();
            $userId = $userDetails['id'];

            $QuickbetRecords = DB::table('quickbets as qb')->select('qb.*', 'u.name as UserName', 'b.bet_description', 'b.bet_name')
                    ->leftJoin('users as u', 'u.id', 'qb.user_id')
                    ->leftJoin('bettings as b', 'b.id', 'qb.bet_id')
                    ->where('qb.user_id', $userId)->orderBy('qb.id', 'DESC')
                    ->get();
//            prd($QuickbetRecords);
            return view('sites.userBets', [
                'QuickbetRecords' => $QuickbetRecords ? $QuickbetRecords : [],
            ]);
        }
        return redirect('/');
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
