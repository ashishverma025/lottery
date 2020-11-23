<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth,DB;
use App\NewWippli;
use App\BusinessDetail;

class WelcomeController extends Controller {

    public function __construct() {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function landing_index() {
        if (Auth::check()) {
            return redirect('user-dashboard');
        }
        return view('sites.index');
    }

    public function userDashboard() {
        if (Auth::check()) {
            $userDetails = getUserDetails();
            $userId =  $userDetails['id'];
            $NewWippli = DB::table('new_wipplis as nw')->select('u.name','u.id as userId','nw.*')
            ->leftJoin('users as u', 'u.id', 'nw.user_id')->where('user_id',$userId)->orderBy('nw.id','DESC')
            ->get();
            // prd($NewWippli);
            return view('sites.user-dashboard',['userDetails'=>$userDetails,'NewWippli'=>$NewWippli]);
        }
        return redirect("/login");
    }
    public function folderView(Request $request,$wippli_id) {
        if (Auth::check()) {
            // echo $wippli_id;die;
            $userDetails = getUserDetails();
            $userId =  $userDetails['id'];
            $postData = $request->post();
            $NewWippli =  DB::table('new_wipplis as nw')->select('bd.business_name','cd.first_name','cd.surname','cd.initials','nw.category as jobtype','nw.type as joboutcome','nw.id as AJN','u.name as CN')
            ->leftJoin('users as u', 'u.id', 'nw.user_id')
            ->leftJoin('contact_details as cd', 'u.id', 'cd.user_id')
            ->leftJoin('business_details as bd', 'cd.organisation', 'bd.id')
            ->where('nw.id',$wippli_id)->orderBy('nw.id','DESC')
            ->get()->toArray();
            // prd($NewWippli);

            if(isset($NewWippli[0]->business_name)){
                $NewWippli = @$NewWippli[0];
                $CN = initials(@$NewWippli->CN);
                $FnLn = @$NewWippli->first_name.' '.@$NewWippli->surname;
                $jobName = getCategory(@$NewWippli->jobtype);
                $jobOutcome = @$NewWippli->joboutcome;
                $businessInitials = @$NewWippli->initials;
                $dateFormat = date('Ymd');
                $autoJobNumber = 'AJN'.@$NewWippli->AJN;
                $BSN = 'BSN_';

                $folderStruct =
                [
                'Admin'=>'Admin',
                'Misc'=>'Misc',
                'BRAND AND ASSETS'=>'ND AND ASSETS',
                "$FnLn"=> ["$CN"=>'Type'],
                "$CN-$jobName"=>["$CN-$jobOutcome"=>[
                    "BSN_".$jobName."_".$jobOutcome."_".$dateFormat."_".$businessInitials."_".$CN."_".$autoJobNumber."_Pv1"=>
                    [
                        "MASTER_".$jobName."_".$jobOutcome."_$dateFormat",
                        "PROOFS_".$jobName."_".$jobOutcome."_$dateFormat",
                        "FINAL_".$jobName."_".$jobOutcome."_$dateFormat",
                        "ASSETS_".$jobName."_".$jobOutcome."_$dateFormat",
                        "PACKAGE_".$jobName."_".$jobOutcome."_$dateFormat",
                        "OTHERS_".$jobName."_".$jobOutcome."_$dateFormat",
                        "BRIEF&Specs_".$jobName."_".$jobOutcome."_$dateFormat",
                        "REFERENCE_".$jobName."_".$jobOutcome."_$dateFormat",
                        "OLD_".$jobName."_".$jobOutcome."_$dateFormat",
                        "ATTACHMENTS_".$jobName."_".$jobOutcome."_$dateFormat",
                    ]
                ]
                ]];
        
                $folderSrruct[$NewWippli->business_name] = $folderStruct;
                prd($folderSrruct);

                return view('sites.generateFolderView',['userDetails'=>$userDetails,'folderSrruct'=>$folderSrruct]);
            }
            return 'Not Found!';

        }
        return redirect("/login");
    }


    public function branniumClientsContacts() {
        if (Auth::check()) {
            $businessDetails = DB::table('business_details as bd')->select('u.name as user_name','u.id as userId','bd.*')
            ->leftJoin('users as u', 'u.id', 'bd.user_id')
            ->where('business_name','like','%Brannium%')->orderBy('bd.id','DESC')
            ->get(); 

            $ContactDetails = DB::table('contact_details as cd')->select('u.name as user_name','u.id as userId','bd.business_name','cd.*')
            ->leftJoin('users as u', 'u.id', 'cd.parent_id')
            ->leftJoin('business_details as bd', 'bd.id', 'cd.organisation')
            ->orderBy('cd.id','DESC')
            ->get();


            // $ClientDetails = DB::table('contact_details as cd')->select('bd.*','cd.id as cId','cd.tbc1','cd.tbc')
            // ->leftJoin('business_details as bd', 'bd.id', 'cd.organisation')
            // ->whereNotNull('cd.id' )
            // ->groupBy('bd.id')
            // ->orderBy('bd.id','DESC')
            // ->get();

            $ClientDetails = DB::table('business_details as bd')->select('bd.*')
            ->where('business_name','not like','%Brannium%')
            ->groupBy('bd.business_name')
            ->orderBy('bd.id','DESC')
            ->get();

            $userDetails = getUserDetails();
            // prd($ClientDetails);
            return view('sites.brannium-clients-contacts',[
                'userDetails'=>$userDetails,
                'businessDetails'=>$businessDetails,
                'ContactDetails'=>$ContactDetails,
                'ClientDetails'=>$ClientDetails
                ]);
        }
        return redirect("/login");
    }


    public function businessDetails() {
        if (Auth::check()) {
            $userDetails = getUserDetails();
            $NewWippli = DB::table('new_wipplis as nw')->select('u.name','u.id as userId','nw.*')
            ->leftJoin('users as u', 'u.id', 'nw.user_id')->orderBy('nw.id','DESC')
            ->get();
            $businessList = DB::table('business_details')->select(['id','business_name'])
            ->where('user_id',$userDetails->id)->orderBy('id','DESC')
              ->get()->toArray();  
            // pr($businessList);
            return view('sites.business-details',[
                'userDetails'=>$userDetails,
                'NewWippli'=>$NewWippli,
                'businessList'=>$businessList
                ]);
        }
        return redirect("/login");
    }


    public function popupForm(Request $request) {
        $response = [];
        $postData = $request->post();
        $email_id = $postData;
        return 'tsedhgv';
        // return view('popupform');
    }
}
