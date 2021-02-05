<?php

use App\Http\Requests;
use App\Http\Controllers\Controller;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth,
DB,
Hash,
Session;
use DataTables;

class ContactController extends Controller
{
   public function contactus()
{

  return view('sites/contact');
}

public function saveContact(Request $request){
	
$this->validate($request,[
    'name'=> 'required',
	'mobile'=> 'required',
		'message'=> 'required'


]);
$name = $request->input('name');
$mobile = $request->input('mobile');
$message = $request->input('message');

$data=array('Name'=>$name,"Phone"=>$mobile ,"Message"=>$message);
DB::table('contact')->insert($data);
return redirect()->back()->with('message', 'SUCCESSFULLY SUBMITTED!');
}

}