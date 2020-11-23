<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Author,
    App\Tutorclass,
    App\TutorStudents,
    App\Attendance,
    App\ClassStudent,
    App\LearningCenter,
    App\Subject;
use App\User;
use Auth,
    DB,
    Hash,
    Session;
use DataTables;

class AccountController extends Controller {

//GET TUTOR STUDENTS LIST POST REQUEST
    public function Account(Request $request, $type = null) {
        if (Auth::check()) {
            $input = $request->all();
            $LcId = getUser_Detail_ByParam('id');
            $students = TutorStudents::where(['tutor_id' => $LcId])->first();
            $classes = DB::table("tutorclasses")
//                    ->where('status', '=', '1')
                    ->where('tutor_id', '=', $LcId)
                    ->pluck("class_name", 'id');

            $class = !empty($input['class']) ? $input['class'] : "";
            $date = !empty($input['date']) ? $input['date'] : "";
            return view('sites-student.account', ['active' => 'account', 'sideActive' => 'notification', 'students' => $students, 'classes' => $classes, 'classfilter' => $class, 'dateFilter' => $date]);
        }
        return redirect('/');
    }

    public function trustVerification(Request $request, $type = null) {
        if (Auth::check()) {
            $userDetails = getUserDetails();
            return view('sites-student.trustVerification', ['active' => 'profile', 'sideActive' => 'trustVerification', 'userDetails' => $userDetails]);
        }
        return redirect('/');
    }

}
?>


