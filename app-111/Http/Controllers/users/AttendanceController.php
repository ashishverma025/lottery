<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Author,
    App\Tutorclass,
    App\Attendance,
    App\Subject;
use App\User;
use Auth,
    DB,
    Hash,
    Session;
use DataTables;
use DateTime;

class AttendanceController extends Controller {

//Show Studance Attendence Dashboard
    public function attendance(Request $request, $type = null) {
        if (Auth::check()) {
            $studentId = getUser_Detail_ByParam('id');
            $input = $request->all();
            $classes = DB::table("class_students as cs")
                    ->leftJoin('tutorclasses as tc', 'tc.id', 'cs.class_id')
                    ->where('cs.student_id', '=', $studentId)
                    ->groupBy('class_id')
                    ->pluck("class_name", 'tc.id');
//            pr($classes);
            $class = !empty($input['class']) ? $input['class'] : "";
            $date = !empty($input['date']) ? $input['date'] : "";

            return view('sites-student.attendance_list', ['active' => 'attendence', 'classes' => $classes, 'classfilter' => $class, 'dateFilter' => $date]);
        }
        return redirect('/');
    }

    public function fetchAttendance(Request $request) {
        $studentId = getUser_Detail_ByParam('id');
        $auth = new Attendance();
        $Query = $auth->fetchAllStudentAttendance($request, $studentId);
        $iTotal = $Query['countQuery'];
        $response = ['iTotalRecords' => $iTotal, 'iTotalDisplayRecords' => $iTotal, 'aaData' => []];
        $k = 0;
        if (count($Query) > 0) {
            foreach ($Query['dataQuery'] as $user) {
                $present_checked = ($user->present == 1) ? 'checked' : '';
                $absent_checked = ($user->absent == 1) ? 'checked' : '';
                $not_engaged_checked = ($user->not_engaged == 1) ? 'checked' : '';
                $response['aaData'][$k] = array(
                    0 => $k + 1,
                    1 => !empty($user->class_date) ? date('d-m-Y', strtotime($user->class_date)) : "N/A",
                    2 => $user->class_name,
                    3 => $user->created_at,
                    4 => "<input type='radio' $present_checked disabled >",
                    5 => "<input type='radio' $absent_checked disabled >",
                    6 => "<input type='radio' $not_engaged_checked disabled >",
                );
                $k++;
            }
        }
        return response()->json($response);
    }

//Show Studance Attendence Summary
    public function attendenceSummary(Request $request, $type = null) {
        if (Auth::check()) {
//        echo 'work in progress';die;
            $userId = getUser_Detail_ByParam('id');
            $auth = new Attendance();
            $allRecords = $auth->getAllattendenceSummary($request);
            if (!empty($allRecords['classfilter'])) {
                $filteredRecord = $allRecords['AttendenceSummary'][$allRecords['classfilter']];
                $allRecords['AttendenceSummary'] = [];
                $allRecords['AttendenceSummary'][$allRecords['classfilter']] = $filteredRecord;
            }
//            pr($allRecords);
            return view('sites.lc_attendence-summary', $allRecords);
        }
        return redirect('/');
    }

    public function attendanceCalendar(Request $request) {
        if (Auth::check()) {
            $input = $request->all();

            $studentId = getUser_Detail_ByParam('id');
            $auth = new Attendance();
            $Query = $auth->getCalendarAttendance($request, $studentId);
            $studentLcs = $auth->getGetStudentLcs($request, $studentId);
            $StudentClasss = $auth->getStudentClasss($request, $studentId);
            $filterLc = !empty($input['lc']) ? $input['lc'] : "";
            $filterClass = !empty($input['class']) ? $input['class'] : "";

//            prd($studentLcs);
            return view('sites-student.calendar', ['calendarEvents' => $Query->toJson(),
                'LearningCenters' => $studentLcs,
                'filterLc' => $filterLc,
                'filterClass' => $filterClass,
                'classfilter' => $filterClass,
                'classes' => $StudentClasss
            ]);
        }
        return redirect('/');
    }

}
?>


