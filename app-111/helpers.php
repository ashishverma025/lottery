<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Category;
use App\Type;


if (!function_exists('PPHttpPost')) {
    function PPHttpPost($methodName_, $nvpStr_) {

        $environment = 'sandbox';
        // Set up your API credentials, PayPal end point, and API version.
        // $API_UserName = urlencode('sb-475hwt1638794_api1.business.example.com');
        // $API_Password = urlencode('LVVNYYLN48VUR8E7');
        // $API_Signature = urlencode('AsLDJ9.m4EOvt0m4bLCC4ceU1Ir9Ads1azXeKNygMQF6hElx5QZL9aWj');

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


if (!function_exists('pr')) {

    function pr($variable) {
        echo '<pre>';
        print_r($variable);
        echo '</pre>';
    }

}

if (!function_exists('prd')) {

    function prd($variable) {
        echo '<pre>';
        print_r($variable);
        echo '</pre>';
        die;
    }

}

if (!function_exists('createDate')) {

    function createDate($d, $action, $format) {
        $date = "$d";
        $date = strtotime($date);
        $date = strtotime($action, $date);
        return date($format, $date);
    }

}

if (!function_exists('DateDiff')) {

    function DateDiff($curdate, $d , $form) {
        $date1=date_create($d);
        $date2=date_create($curdate);
        $diff=date_diff($date2,$date1);
        // prd($diff->format("%R%a days"));
        return $diff->format("%R%a days");
    }

}


if (!function_exists('profile_Image_path')) {

    function get_profile_image_dir($userID) {
        $destinationPath = config('common.ADMIN_PROFILE_IMG_URL');
        if (!empty($userID)) {
//            $result = $destinationPath . $userID . "/" . date('Y') . "/" . date('m') . "/" . date('d') . '/';
            $result = $destinationPath . $userID . "/";
        } else {
            $result = $destinationPath . 'dummy.jpg';
        }
        return $result;
    }

}

if (!function_exists('upload_profile_image')) {

    function upload_profile_image($userID, $file) {
        if (!empty($userID) && !empty($file)) {
            $today = date("Ymds");
            $fileName = $today . $file->getClientOriginalName();
            $destinationPath = public_path() . get_profile_image_dir($userID);
            $file->move($destinationPath, $fileName);
            return $fileName;
        } else {
            return "Please pass a valid parameter's !";
        }
    }

}

if (!function_exists('upload_site_profile_image')) {

    function upload_site_profile_image($userID, $file) {
        if (!empty($userID) && !empty($file)) {
            $today = date("Ymds");
            $fileName = $today . $file->getClientOriginalName();
            $destinationPath = public_path() . get_profile_image_dir($userID);
            $file->move($destinationPath, $fileName);
            return $fileName;
        } else {
            return "Please pass a valid parameter's !";
        }
    }

}


if (!function_exists('get_site_image_dir')) {

    function get_site_image_dir($userID, $folder) {
        $destinationPath = config('common.SITES_IMG_URL');
        if (!empty($userID)) {
//            $result = $destinationPath . $userID . "/" . date('Y') . "/" . date('m') . "/" . date('d') . '/';
            $result = $destinationPath . $folder . '/' . $userID . "/";
        } else {
            $result = $destinationPath . 'dummy.jpg';
        }
        return $result;
    }

}


if (!function_exists('get_admin_image_dir')) {

    function get_admin_image_dir($folder) {
        $destinationPath = config('common.ADMIN_IMG_URL');
        $result = $destinationPath . $folder . "/";
        return $result;
    }

}


if (!function_exists('upload_admin_images')) {

    function upload_admin_images($file, $folder) {
        if (!empty($file)) {
            $today = date("Ymds");
            $fileName = $today . $file->getClientOriginalName();
            $destinationPath = public_path() . get_admin_image_dir($folder);
//            echo $destinationPath.'/'.$fileName;die;
            $file->move($destinationPath, $fileName);
            return $fileName;
        } else {
            return "Please pass a valid parameter's !";
        }
    }

}

if (!function_exists('upload_wippli_images')) {

    function upload_wippli_images($file, $folder) {
        if (!empty($folder) && !empty($file)) {
            $today = date("Ymds");
            $fileName = $today . $file->getClientOriginalName();

            $destinationPath = config('common.SITES_IMG_URL');
            if (!empty($folder)) {
                $image_dir = $destinationPath . $folder . "/";
            } else {
                $image_dir = $destinationPath . 'dummy.jpg';
            }

            $destinationPath = public_path() . $image_dir;
            $file->move($destinationPath, $fileName);
            return $fileName;
        } else {
            return "Please pass a valid parameter's !";
        }
    }

}



if (!function_exists('upload_site_images')) {

    function upload_site_images($userID, $file, $folder) {
        if (!empty($userID) && !empty($file)) {
            $today = date("Ymds");
            $fileName = $today . $file->getClientOriginalName();
            $destinationPath = public_path() . get_site_image_dir($userID, $folder);
//            echo $destinationPath.'/'.$fileName;die;
            $file->move($destinationPath, $fileName);
            return $fileName;
        } else {
            return "Please pass a valid parameter's !";
        }
    }
}
if (!function_exists('find_file_on_directories')) {

    function find_file_on_directories($directory1, $directory2, $fileName) {
        $userID = "";
        if (!empty($fileName) && (!empty($directory1) || !empty($directory2))) {

            $Directory1 = public_path() . $directory1 . '/' . $fileName;
            $Directory2 = public_path() . $directory2 . '/' . $fileName;

            if (file_exists($Directory1)) {
                return $directory1 . '/' . $fileName;
            } else if (file_exists($Directory2)) {
                return $directory2 . '/' . $fileName;
            } else {
                return get_profile_image_dir($userID);
            }
        } else {
            return "Please pass a valid parameter's !";
        }
    }

}
if (!function_exists('test')) {

    function test($directory1, $directory2, $fileName) {
        $userID = "";
        if (!empty($fileName) && (!empty($directory1) || !empty($directory2))) {

            $Directory1 = public_path() . $directory1 . '/' . $fileName;
            $Directory2 = public_path() . $directory2 . '/' . $fileName;

            if (file_exists($Directory1)) {
                return $directory1 . '/' . $fileName;
            } else if (file_exists($Directory2)) {
                return $directory2 . '/' . $fileName;
            } else {
                return get_profile_image_dir($userID);
            }
        } else {
            return "Please pass a valid parameter's !";
        }
    }

}

if (!function_exists('getUser_Detail_ByParam')) {

    function getUser_Detail_ByParam($param) {
        $result = [];
        if (!empty($param))
            $result = Auth::user()->$param;
//        prd($result);
        return $result;
    }

}

if (!function_exists('getUserDetails')) {

    function getUserDetails() {
        $userId = getUser_Detail_ByParam('id');
        $user = Auth::user();
//        prd($User);
        return $user;
    }

}

if (!function_exists('getRoleNameById')) {

    function getRoleNameById($roleId) {
        $Role = "";
        if(!empty($roleId)){
            $Role = DB::table('roles as r')
                    ->select('*')
                    ->where('r.id',$roleId)
                    ->first();
        }
        return $Role ? $Role->name : "";
    }
}


if (!function_exists('getUserDetails')) {

    function getUserDetails() {
        $userId = getUser_Detail_ByParam('id');
        $UserDetails = $users = DB::table('learning_centers')->where('user_id', $userId)->get();
//        pr($User);
        return isset($UserDetails[0]) ? $UserDetails[0] : "";
    }

}



if (!function_exists('findData')) {

    function findData($table, $columns, $whereclm, $value) {
        $result = DB::table($table)
        ->select($columns)
        ->where($whereclm, '=', $value)
        ->get()->toArray();
        return $result;
    }

}

if (!function_exists('getUserDetailsById')) {

    function getUserDetailsById($userId) {
        $User = "";
        if (!empty($userId)) {
            $User = DB::table('users')->select('id', 'name', 'fname', 'lname', 'dob', 'avatar', 'user_type', 'email', 'address', 'gender')->where('id', '=', $userId)->get();
            $User = $User[0];
        }
        return $User;
    }

}

//if (!function_exists('is_email_exist')) {
//
//    function is_email_exist($email) {
//        $User = "";
//        if (!empty($userId)) {
//            $User = DB::table('users')->where('id', '=', $email)->get();
//            $User = $User[0];
//        }
//        return $User;
//    }
//
//}

if (!function_exists('get_currentuser_roles')) {

    function get_currentuser_roles() {
        $userId = getUser_Detail_ByParam('id');
//        $sql = "select GROUP_CONCAT(r.id) as role_id from roles as r LEFT JOIN users_roles as ur ON ur.role_id = r.id WHERE ur.user_id = $userId";
        $data = DB::table('roles as r')
        ->join('users_roles as ur', 'ur.role_id', '=', 'r.id')
        ->selectRaw('GROUP_CONCAT(r.id) as role_id')->where('ur.user_id', $userId)
        ->get()->toArray();
        $data = $data[0]->role_id;
        return $data;
    }

}
if (!function_exists('get_institute_details')) {

    function get_institute_details($data) {
        $data = DB::table('institutes')
        ->select('*')->where('institute_name', $data)
        ->get()->toArray();
        $data[0]->institute_logo = !empty($data[0]->institute_logo) ? '/public/admin/upload/institute/' . $data[0]->institute_logo : '/public/sites/images/dummy.jpg';
        return isset($data[0]) ? $data[0]->institute_logo : [];
    }

}

if (!function_exists('get_rolesByUserId')) {

    function get_rolesByUserId($userId) {
        $data = "$userId is not a valid User Id";
        if (!empty($userId) && is_numeric($userId)) {
//            $sql = "select GROUP_CONCAT(r.id) as role_id from roles as r LEFT JOIN users_roles as ur ON ur.role_id = r.id WHERE ur.user_id = $userId";
            $data = DB::table('roles as r')
            ->join('users_roles as ur', 'ur.role_id', '=', 'r.id')
            ->selectRaw('GROUP_CONCAT(r.id) as role_id')
            ->where('ur.user_id', $userId)
            ->get()->toArray();
            $data = $data[0]->role_id;
        }
        return $data;
    }

}

if (!function_exists('get_currentuser_permissions')) {

    function get_currentuser_permissions() {
        $search = get_currentuser_roles();
        $data = DB::table('permissions as p')
        ->join('roles_permissions as rp', 'rp.permission_id', '=', 'p.id')
        ->selectRaw('GROUP_CONCAT(p.name) as permission_name', 'p.id')
        ->whereRaw("find_in_set(rp.role_id,'" . $search . "')")
        ->groupBy('rp.permission_id')
        ->get()->toArray();
        $data = $data;
        return $data;
    }

}

if (!function_exists('get_rolesByUserId')) {

    function get_rolesByUserId($userId) {
        $data = "$userId is not a valid User Id";
        if (!empty($userId) && is_numeric($userId)) {
            $search = get_rolesByUserId($userId);
            $data = DB::table('roles_permissions as rp')
            ->selectRaw('GROUP_CONCAT(rp.permission_id) as permission_id')
            ->whereRaw("find_in_set(rp.role_id,'" . $search . "')")
            ->get()->toArray();
            $data = $data[0]->permission_id;
        }
        return $data;
    }

}

if (!function_exists('get_custom_dob')) {

    function get_custom_dob() {
        $dob_months = [];
        $dob_years = [1989, 1990, 1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999, 2000, 2001, 2002, 2003, 2004, 2005, 2006, 2007, 2008, 2009, 2010];
        $dob_months = [1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec'];
        $dob_days = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31];
        $dob_week_days = [1 => 'Sunday', 2 => 'Monday', 3 => 'Tuesday', 4 => 'Wednesday', 5 => 'Thursday', 6 => 'Friday', 7 => 'Saturday', 8 => 'M-W-F', 9 => 'T-T-S', 10 => 'Weekends', 11 => 'WeekDays', 12 => 'Regular'];

        $dob['years'] = $dob_years;
        $dob['months'] = $dob_months;
        $dob['days'] = $dob_days;
        $dob['week_days'] = $dob_week_days;
        return $dob;
    }

}

if (!function_exists('currentUser_dob')) {

    function currentUser_dob($Dob) {
        $dOb = ['years' => '', 'months' => '', 'days' => ''];
        if (!empty($Dob)) {
            $dob = explode('-', $Dob);
            $dOb = [];
            $dOb['years'] = $dob[0];
            $dOb['months'] = $dob[1];
            $dOb['days'] = $dob[2];
        }
        return $dOb;
    }

}
if (!function_exists('set_flash_message')) {

    function set_flash_message($message, $msg_type) {
        Session::flash('message', $message);
        Session::flash('alert-class', $msg_type);
    }

}

if (!function_exists('is_email_exist')) {

    function is_email_exist($email) {
        $response = [];
        $response['status'] = 'not exist';
        $response['msg'] = 'Email does not exist.';
        if (!empty($email)) {
            $User = DB::table('users')->where('email', $email)->get();
            if (isset($User[0]) && !empty($User[0])) {
                $response['status'] = 'exist';
                $response['msg'] = 'Email id "' . $email . '" already exist.';
                $response['id'] = $User[0]->id;
            }
        }
        return $response;
    }

}
if (!function_exists('is_email_verified')) {

    function is_email_verified($userID) {
        $response = 'verified';
        if (!empty($userID)) {
            $User = DB::table('users')->where('id', $userID)->where('email_verified_at', null)->get();
            if (isset($User[0]) && !empty($User[0])) {
                $response = 'not verified';
            }
            return $response;
        }
    }

}

if (!function_exists('is_email_exist_in_csv')) {

    function is_email_exist_in_csv($fileName, $request) {
        $response = [];
        $response['notExistingEmail'] = [];
        $response['existingEmail'] = [];
        $response['id'][] = "";
        $response['status'] = 'not exist';
        $allowedColNum = 8;

        if ($request->file($fileName) !== null) {
            $file = $request->file($fileName);
            if ($_FILES[$fileName]["size"] > 0) {
                $fileName = $_FILES[$fileName]["tmp_name"];
                $explodeName = explode('.', $_FILES['csv_student']['name']);
                $ext = $explodeName[1];
                if ($ext != 'csv') {
                    $response['status'] = 'failed';
                    $response['msg'] = "Uploaded file is not valid";
                    return $response;
                }
                $file = fopen($fileName, "r");
                $i = 0;
                while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
//                    $numcols = count($line);
//                    if ($numcols != $allowedColNum) {
//                        return $res;
//                    }
                    if ($i != 0) {
                        $emailExist = is_email_exist($column[3]);
                        if ($emailExist['status'] == "exist") {
                            if (isset($column[3]) && !empty($column[3])) {
                                $response['existingEmail'][$emailExist['id']] = $column[3];
                                $response['id'][] = $emailExist['id'];
                            }
                            $response['status'] = 'exist';
                        } else {
                            $response['notExistingEmail'][] = $column[3];
                        }
                    }
                    $i++;
                }
            }
        }
        if (isset($response['existingEmail'])) {
//            $response['LcExistMsg'] = "E-mail ids " . implode(',', $response['existingEmail']) . " are already exist in your LC and rest are added in your LC ";
//            $response['msg'] = "Following Listbox students are already exist in Global students list and rest are added in your LC";
        }
//        prd($response);
        return $response;
    }

}


if (!function_exists('student_verify')) {

    function student_verify($studentIid, $teacherId) {
        $response = [];
        $response['status'] = 'not exist';
        $response['msg'] = 'Student does not exist.';
        if (!empty($studentIid) && !empty($teacherId)) {
            $User = DB::table('tutor_students')->where(['tutor_id' => $teacherId, 'student_id' => $studentIid])->get();
            if (isset($User[0]) && !empty($User[0])) {
                $response['status'] = 'exist';
                $response['msg'] = 'Student Verified successfully';
            }
        }

        return $response;
    }

}

if (!function_exists('getStudentClases')) {

    function getStudentClases($studentIid, $teacherId) {
        $response = [];
        if (!empty($studentIid) && !empty($teacherId)) {
            $classes = DB::table('class_students')->select(DB::raw('group_concat(class_id) as class_ids'))
            ->where(['lc_id' => $teacherId, 'student_id' => $studentIid])
            ->get();
            if (isset($classes[0]) && !empty($classes)) {
                return explode(',', $classes[0]->class_ids);
            }
        }

        return $response;
    }

}
if (!function_exists('getStudentClasesNames')) {

    function getStudentClasesNames($studentIid, $teacherId) {
        $response = [];
        if (!empty($studentIid) && !empty($teacherId)) {
            $classes = DB::table('class_students as cs')->select(DB::raw('group_concat(tc.class_name) as class_names'))
            ->leftJoin('tutorclasses as tc', 'tc.id', 'cs.class_id')
            ->where(['cs.lc_id' => $teacherId, 'cs.student_id' => $studentIid])
            ->get();
            if (isset($classes[0]) && !empty($classes)) {
                return explode(',', $classes[0]->class_names);
            }
        }

        return $response;
    }

}

if (!function_exists('QueryString')) {

    function QueryString() {
        if (isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING'])) {
            return $_SERVER['QUERY_STRING'];
        }
        return "";
    }

}

if (!function_exists('userRolePermissionCheck')) {

    function userRolePermissionCheck() {
        $userType = getUser_Detail_ByParam('user_type');
        if (isset($userType) && !empty($userType)) {
            if ($userType == 4) {
                return 'student/dashboard';
            }
            return true;
        }
    }

}


function mailSend($toMail,$subject,$message){
    if(!empty($toMail)){
        $to = $toMail;
        $headers = "From: wippli@mail.com" . "\r\n";
        mail($to,$subject,$message,$headers);
    }
}


if (!function_exists('sendMail')) {

    function sendMail($request, $bodyData, $message, $email, $subject, $fromName, $templateName) {
        Mail::send("Email-Templates.$templateName", ['data' => $bodyData], function ($message) use ($email, $fromName, $subject) {
            $message->from('wippli@mail.com', $fromName);
            $message->to($email)->subject($subject);
        });
    }
}
if (!function_exists('randomPassword')) {

    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

}
if (!function_exists('encode')) {

    function encode($variable) {
        if (!empty($variable)) {
            return convert_uuencode($variable);
        }

        return "";
    }

}
if (!function_exists('decode')) {

    function decode($variable) {
        if (!empty($variable)) {
            return convert_uudecode($variable);
        }

        return "";
    }

}

if (!function_exists('getSubjectNameById')) {

    function getSubjectNameById($subId) {
//         syllabus as s ON s.subject_id = sl.id

        $subjectName = DB::table('subjects')
        ->select('subjects_name', 'id')
        ->where('id', $subId)
        ->get();
        return isset($subjectName[0]->subjects_name) ? @$subjectName[0]->subjects_name : "";
    }

}

if (!function_exists('initials')) {
    function initials($str) {
        $ret = '';
        foreach (explode(' ', $str) as $word)
            $ret .= strtoupper($word[0]);
        return $ret;
    }
}
if (!function_exists('getCategory')) {
    function getCategory($catId) {
        if(!empty($catId)){
        $Category = Category::where('id',$catId)->first();
            return $Category->cat_name;
        }
        return 'JOBName';
    }
}

if (!function_exists('generatePlanFolder')) {

    function generatePlanFolder($wippliData,$folderSrruct) {
//   prd($folderSrruct);
      foreach ($folderSrruct as $k1 => $first) {
        //   prd($k1);
        $path = public_path() .'/business-contacts/'. $k1;
        if (!file_exists($path)) {
          mkdir($path,0755, true);
        }else{
            echo "Already Exist";
        }
  
        foreach ($first as $k2 => $second) {
          $path = public_path() .'/business-contacts/'. $k1.'/'.$k2;
          if (!file_exists($path)) {
            mkdir($path, 0755, true);
          }
          if(is_array($second)){
            foreach ($second as $k3 => $third) {
              $path = public_path() .'/business-contacts/'. $k1.'/'.$k2.'/'.$k3;
              if (!file_exists($path)) {
                mkdir($path, 0755, true);
              }

              if(is_array($third)){
                foreach ($third as $k4 => $fourth) {
                  $path = public_path() .'/business-contacts/'. $k1.'/'.$k2.'/'.$k3.'/'.$k4;
                  if (!file_exists($path)) {
                    mkdir($path, 0755, true);
                  }

                  if(is_array($fourth)){
                    foreach ($fourth as $k5 => $fifth) {
                        // pr($fifth);
                      $path = public_path() .'/business-contacts/'. $k1.'/'.$k2.'/'.$k3.'/'.$k4.'/'.$fifth;
                      if (!file_exists($path)) {
                        mkdir($path, 0755, true);
                      }
                    }
                  }

                }
              }
            }
          }
        }
      }
      return 'success';
    }
  }

