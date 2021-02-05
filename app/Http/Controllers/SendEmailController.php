<?php

use App\Http\Controllers\Controller;
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth,
DB,
Hash,
Session;
use DataTables;



use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendEmailController extends Controller
{
    function index()
    {
     return view('contactus');
    }

    function send(Request $request)
    {
     $this->validate($request, [
      'name'     =>  'required',
      'mobile'  =>  'required',
      'message' =>  'required'
     ]);

        $data = array(
            'name'      =>  $request->name,
			  'phone'   =>  $request->mobile,
            'message'   =>   $request->message
        );
DB::table('contact')->insert($data);

     Mail::to('richard@betwelle.com')->send(new SendMail($data));
     return back()->with('success', 'Thanks for contacting us!');

    }
}



?>
