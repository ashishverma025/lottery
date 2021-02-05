<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PaymentAddController extends Controller {

	
   public function insert(Request $request) {

  $userDetails = getUserDetails();

$user=($userDetails['id']);
$created_at=($userDetails['created_at']);
$updated_at=($userDetails['updated_at']);
$postdata=$request->all();
$bid=($postdata['bid']);
$amount=($postdata['amount']);
$betid=($postdata['userbetid']);

$paymentstatus="COMPLETED";
$currency="USD";

$amt=($postdata['wallet']);

$data=array('walletamount'=>$amt,"currency"=>$currency,"quickbet_id"=>$betid,"payment_status"=>$paymentstatus,"user_id"=>$user,"bet_id"=>$bid,"amount"=>$amount,"created_at"=>$created_at,"updated_at"=>$updated_at);
DB::table('payments')->insert($data);
  DB::update('update users  set amt = ? where id = ?',[$amt,$user]);  
      echo "Record inserted successfully.<br/>";
 return redirect()->back()->with('success', 'succesfully added payment');  


   }
}
