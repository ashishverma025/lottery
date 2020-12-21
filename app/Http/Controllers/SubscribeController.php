<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Plan,
App\Subscription,
App\Subscriber;
use Auth,
DB,
Hash,
Session;
use DataTables;

class SubscribeController extends Controller {

//GET TUTOR STUDENTS LIST POST REQUEST
    public function Subscribe(Request $request, $type = null) {
        if (Auth::check()) {
            $input = $request->all();
            $planDetails = [];
            $allPlans = [];
            $plans = Subscription::where(['status' => 'active'])->get();
            if (!empty($plans)) {
                foreach ($plans as $key => $plan) {
                    $planDetails['planId'] = $plan['id'];
                    $planDetails['planName'] = $plan['plan_name'];
                    $planDetails['subscriptionFee'] = $plan['subscription_fee'];
                    $planDetails['duration'] = $plan['duration'];
                    $planDetails['description'] = $plan['description'];
                    $planDetails['discount'] = $plan['discount'];
                    $allPlans[] = $planDetails;
                }
            }
            //  prd($allPlans);
            return view('sites-student.subscribe', ['active' => 'subscribe', 'allPlans' => $allPlans]);
        }
        return redirect('/');
    }

    public function subscribePlan(Request $request, $id = null) {
        if (Auth::check()) {
            $input = $request->all();
            $userDetails = getUserDetails();
            $plans = Subscription::where(['id' => $id])->first();
            
            $Subscriber = Subscriber::where(['user_id' => $userDetails['id']])->where('subscription_id', '!=', 1)->first();
            if (isset($Subscriber['subscription_id']) && !empty($Subscriber)) {
                $planExist = 'Yes';
            } else {
                $planExist = 'No';
            }
//            prd($Subscriber);
            //echo createDate(date('Y-m-d'), "+".$plans['duration'], 'Y-m-d');die;
            if (!empty($plans)) {
                if ($request->isMethod('get')) {
                    return view('sites-student.payment', ['active' => 'subscribe', 'planDetails' => $plans,'planExist' => $planExist]);
                }
            }
            return redirect('/subscribe');
        }
        return redirect('/');
    }

    public function getOffer(Request $request, $id = null) {
        if (Auth::check()) {
            $input = $request->all();
            $userDetails = getUserDetails();
            $plans = Subscription::where(['id' => $id])->first();
//            echo createDate(date('Y-m-d'), "+".$plans['duration'], 'Y-m-d');die;
//            prd($plans['duration']);
            if (!empty($plans)) {
                if ($request->isMethod('get')) {
                    return view('sites-student.getOffer', ['active' => 'subscribe', 'planDetails' => $plans]);
                }
            }
            return redirect('/plans');
        }
        return redirect('/');
    }

    public function Plans(Request $request) {
        if (Auth::check()) {
            $userDetails = getUserDetails();
            $planDetails = [];
            $allPlans = [];
            $plans = Subscription::where(['status' => 'active'])->get();
            $Subscriber = Subscriber::where(['status' => 'active', 'user_id' => $userDetails['id']])->where('subscription_id', '!=', 1)->first();

            if (!empty($plans)) {
                foreach ($plans as $key => $plan) {
                    $planDetails['planId'] = $plan['id'];
                    $planDetails['planName'] = $plan['plan_name'];
                    $planDetails['subscriptionFee'] = $plan['subscription_fee'];
                    $planDetails['duration'] = $plan['duration'];
                    $planDetails['description'] = $plan['description'];
                    $planDetails['discount'] = $plan['discount'];
                    $planDetails['recommended'] = $plan['recommended'];
                    $planDetails['button'] = "";
                    $planDetails['cancel'] = "";
                    $planDetails['plan'] = 1;
                    $planDetails['remainingDays'] = '';

                    if (isset($Subscriber['subscription_id']) && !empty($Subscriber['subscription_id'])) {
                        if ($Subscriber['subscription_id'] == $plan['id']) {
                            $planDetails['remainingDays'] = DateDiff(date('Y-m-d'), $Subscriber['end_date'],'days').' validity';
                            $planDetails['button'] = 'Current Plan';
                            $planDetails['cancel'] = 'Cancel';
                        } else {
                            $planDetails['button'] = 'Upgrade';
                        }
                    } else {
                        $planDetails['button'] = 'Start Free Trial';
                        if ($plan['id'] == 1) {
                            $planDetails['button'] = 'Current Plan';
                        }
                    }


                    $allPlans[] = $planDetails;
                }
            }
            //  prd($allPlans);
            return view('sites-student.plan', ['active' => 'subscribe', 'allPlans' => $allPlans, 'Subscriber' => $Subscriber]);
        }
        return redirect('/');
    }



    public function subscriptionDetails(){
        if (Auth::check()) {
            $userDetails = getUserDetails();
            $plans = Subscriber::where(['status'=>'active','user_id'=>$userDetails['id']])->first();
            $Subscription = $plans ? Subscription::where(['id'=>$plans['subscription_id']])->first() : Subscription::where(['id'=>1])->first();
            $plans = !empty($plans)?$plans:"";
            // prd($plans);
            return view('sites-student.subscriptionDetails', ['active' => 'profile', 'sideActive' => 'subscriptionDetails', 'userDetails' => $userDetails,'Plans'=>$plans,'Subscription'=>$Subscription]);
        }
        return redirect('/');
    }

    public function subscriptionCancel(Request $request,$sId){
        if (Auth::check()) {
            // prd($sId);
            DB::table('subscribers')
                    ->where(['id' => $sId])
                    ->update(['status' => 'cancel']);
            return redirect('/subscriptionDetails');
        }
        return redirect('/');
    }
}
?>


