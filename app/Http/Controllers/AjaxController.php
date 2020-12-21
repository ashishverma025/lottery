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
use App\Payment;
use App\Betting;
use App\Http\Requests;
use File;
use ZipArchive;
use App\Quickbet;

class AjaxController extends Controller {

//CHECK UNIQUE EMAIL 

    public function popupForm(Request $request) {
        $response = [];
        $postData = $request->post();
        $categories = Category::where('status', 'active')->get();

        return view('sites/popupForm', [
            'categories' => $categories ? $categories : "",
        ]);
    }

    public function getBetDetails(Request $request) {
        $response = [];
        $postData = $request->post();
        $betId = $postData['betId'];
        $Betting = Betting::where('id', $betId)->get()->toArray();
//        prd($Betting);
        return view('sites/betting-details', [
            'Betting' => $Betting ? $Betting[0] : "",
        ]);
    }

    public function addUserBet(Request $request) {
        $userDetails = getUserDetails();
        $postData = $request->post();
        $Quickbet = !empty($postData['bet_id']) ? new Quickbet() : Quickbet::where(['id' => $businesId])->first();
//prd($postData);
        $Quickbet->user_id = !empty($userDetails['id']) ? $userDetails['id'] : '';
        $Quickbet->bet_id = !empty($postData['bet_id']) ? $postData['bet_id'] : '';
        $Quickbet->num1 = !empty($postData['num1']) ? $postData['num1'] : '';
        $Quickbet->num2 = !empty($postData['num2']) ? $postData['num2'] : '';
        $Quickbet->num3 = !empty($postData['num3']) ? $postData['num3'] : '';
        $Quickbet->num4 = !empty($postData['num4']) ? $postData['num4'] : '';
        $Quickbet->num5 = !empty($postData['num5']) ? $postData['num5'] : '';
        $Quickbet->amount = !empty($postData['amount']) ? $postData['amount'] : '';
        $Quickbet->status = 'Inactive';
        $Quickbet->created_at = date('Y-m-d H:i:s');
        $Quickbet->save();
        return $Quickbet->id;
    }

//CHECK UNIQUE EMAIL

    public function isEmailExist(Request $request) {
        $response = [];
        $postData = $request->post();
        $email_id = $postData['email'];
        return is_email_exist($email_id);
    }

    public function saveTransaction(Request $request) {
        $postData = $request->all();
        $userDetails = getUserDetails();
        if ($request->isMethod('post')) {
            $sId = $postData['sId'];
            $transDetails = $postData['details'];
            $amount = $postData['amt'];
            $quickBetId = $postData['userBetId'];

            if (!empty($transDetails)) {
                $currency = $postData['cur'];

                $Payment = new Payment();
                $Payment->transaction_history = json_encode($postData);
                $Payment->user_id = $userDetails['id'];
                $Payment->bet_id = $sId;
                $Payment->quickbet_id = $quickBetId;
                $Payment->transaction_id = $transDetails['id'];
                $Payment->amount = $amount;
                $Payment->currency = $currency;
                $Payment->payment_status = $transDetails['status'];
                $Payment->transaction_time = $transDetails['create_time'];
                $Payment->created_at = date('Y-m-d H:i:s');
                if ($Payment->save()) {
                    $Quickbet = Quickbet::where(['id' => $quickBetId])->first();
                    $Quickbet->status = 'Active';
                    if ($transDetails['status'] == 'COMPLETED') {
                        $Quickbet->save();
                    }
                    return 'success';
                }
            }
        }
    }

//join learning center verification link get request
    public function checkExistEmail(Request $request) {
        $postData = $request->all();
        $email = $postData['email'] ? $postData['email'] : "";
        $response = [];
        if (!empty($email)) {
            $isExist = is_email_exist($email);
            if ($isExist['status'] == 'exist') {
                $response = 'false';
            } else {
                $response = 'true';
            }
            return $response;
        }
    }

    public function directPayment($request, $postData, $userDetails) {
        if (!empty($postData)) {
            $Directpayment = new Directpayment();
            $Directpayment->subscription_id = $postData['sId'];
            $Directpayment->user_id = $userDetails['id'];
            $Directpayment->firstname = $firstName = $postData['firstname'];
            $Directpayment->lastname = $lastName = $postData['lastname'];
            $Directpayment->city = $city = $postData['city'];
            $Directpayment->address = $address1 = $postData['address'];
            $Directpayment->state = $state = $postData['state'];
            $Directpayment->zip = $zip = $postData['zip'];
            $Directpayment->cardholder = $postData['cardholder'];
            $Directpayment->cardtype = $creditCardType = $postData['cardtype'];
            $Directpayment->card_number = $creditCardNumber = $postData['cardnumber'];
            $Directpayment->expiry_month = $padDateMonth = $postData['cardmonth'];
            $Directpayment->expiry_year = $expDateYear = $postData['cardyear'];
            $Directpayment->cvv_code = $cvv2Number = $postData['cardcvv'];
            $Directpayment->status = 'active';

            $country = 'US';
            $currencyID = 'USD';
            $paymentType = 'Sale';
            $amount = 1.0;

            $nvpStrr = "&PAYMENTACTION=$paymentType&AMT=$amount&CREDITCARDTYPE=$creditCardType&ACCT=$creditCardNumber" .
                    "&EXPDATE=$padDateMonth$expDateYear&CVV2=$cvv2Number&FIRSTNAME=$firstName&LASTNAME=$lastName" .
                    "&STREET=$address1&CITY=$city&STATE=$state&ZIP=$zip&COUNTRYCODE=$country&CURRENCYCODE=$currencyID";

            //$nvpStrr = '&PAYMENTACTION=Sale&AMT=1.00&CREDITCARDTYPE=visa&ACCT=4111111111111111&EXPDATE=122021&CVV2=962&FIRSTNAME=John&LASTNAME=Doe&STREET=1+Main+St&CITY=San+Jose&STATE=CA&ZIP=95131&COUNTRYCODE=US&CURRENCYCODE=USD';
            // Inactive all previous card details 
            $cardDetailexists = Directpayment::where(['user_id' => $userDetails['id']])->first();
            if (!empty($cardDetailexists)) {
                DB::table('directpayments')->where(['user_id' => $userDetails['id']])->update(['status' => 'inactive']);
            }

            $Directpayment->payment_status = 'SUCCESS';
            $Directpayment->save();
            return $Directpayment->id;
            $httpParsedResponseAr = PPHttpPost('DoDirectPayment', $nvpStrr);
            // prd($httpParsedResponseAr);
//            if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {
//                $Directpayment->payment_status = $httpParsedResponseAr["ACK"];
//                $Directpayment->save();
//                return $Directpayment->id;
//            } else {
//                return '';
//            }
        }
    }

    public function PPHttpPost($methodName_, $nvpStr_) {

        $environment = 'sandbox';

        $API_UserName = urlencode('sb-cp3ue1622267_api1.business.example.com');
        $API_Password = urlencode('VLAUEKHH45JUHQ2L');
        $API_Signature = urlencode('AotxXz-JzgVsHQvKTWiUSLnYovpTA02qBKNbROmvZGML-cn9J30X3rNu');

        $API_Endpoint = "https://api-3t.paypal.com/nvp";
        if ("sandbox" === $environment || "beta-sandbox" === $environment) {
            $API_Endpoint = "https://api-3t.$environment.paypal.com/nvp";
        }
        $version = urlencode('51.0');

        // Set the API operation, version, and API signature in the request.
        $nvpreq = "METHOD=$methodName_&VERSION=$version&PWD=$API_Password&USER=$API_UserName&SIGNATURE=$API_Signature$nvpStr_";

        // Set the curl parameters.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $API_Endpoint);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        // Turn off the server and peer verification (TrustManager Concept).
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        // Set the request as a POST FIELD for curl.
        curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);
        // Get response from the server.
        $httpResponse = curl_exec($ch);

        if (!$httpResponse) {
            exit("$methodName_ failed: " . curl_error($ch) . '(' . curl_errno($ch) . ')');
        }
        // Extract the response details.
        $httpResponseAr = explode("&", $httpResponse);

        $httpParsedResponseAr = array();
        foreach ($httpResponseAr as $i => $value) {
            $tmpAr = explode("=", $value);
            if (sizeof($tmpAr) > 1) {
                $httpParsedResponseAr[$tmpAr[0]] = $tmpAr[1];
            }
        }
        if ((0 == sizeof($httpParsedResponseAr)) || !array_key_exists('ACK', $httpParsedResponseAr)) {
            exit("Invalid HTTP Response for POST request($nvpreq) to $API_Endpoint.");
        }

        return $httpParsedResponseAr;
    }

}

?>