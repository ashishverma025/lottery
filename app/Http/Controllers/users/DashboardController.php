<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MyController;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use DB;
use Redirect;
use Hash;
use App\TutorStudents;
use App\ClassStudent;
use App\Subject;

class DashboardController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct() {
//
//        $this->middleware('auth');
//    }
    //Show Studance Attendence Dashboard
    public function test(Request $request, $type = null) {
        if (Auth::check()) {
            $studentId = getUser_Detail_ByParam('id');
            $DashboardDetails = [];
           

            $DashboardDetails['LearningCenters'] = "";
            $DashboardDetails['classes'] = "";
            $DashboardDetails['subjects'] = Subject::where(['user_id' => $studentId])->count();
//            pr($DashboardDetails);
            return view('sites-student.student-dashboard', ['active' => 'Dashboard', 'DashboardDetails' => $DashboardDetails]);
        }
        return redirect('/');
    }

    public function index() {
        if (Auth::check()) {
            $studentId = getUser_Detail_ByParam('id');
            $DashboardDetails = [];

            $DashboardDetails['LearningCenters'] = "";
            $DashboardDetails['classes'] = "";
            $DashboardDetails['subjects'] = "5";
           // pr($DashboardDetails);
//            return view('sites-student.dashboard1', ['active' => 'dashboard', 'DashboardDetails' => $DashboardDetails]);
            return view('users-dashboard.dashboard', ['active' => 'dashboard', 'DashboardDetails' => $DashboardDetails]);
        }
        return redirect('/');
    }
    public function index1() {
        if (Auth::check()) {
            $studentId = getUser_Detail_ByParam('id');
            $DashboardDetails = [];
            $ClassStudent = DB::table('tutor_students as ts')->select('ts.tutor_id', DB::raw('count(ts.tutor_id) as TotalLC'))
                    ->where(['ts.student_id' => $studentId])
                    ->groupBy('ts.tutor_id')
                    ->get()
                    ->count();
            $DashboardDetails['LearningCenters'] = $ClassStudent;
            $DashboardDetails['classes'] = $ClassStudent;
            $DashboardDetails['subjects'] = Subject::where(['user_id' => $studentId])->count();
//            pr($DashboardDetails);
            return view('sites-student.dashboard', ['active' => 'Dashboard', 'DashboardDetails' => $DashboardDetails]);
        }
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editprofile($id) {
        return view('admin.edit_profile', ['userData' => getUserDetailsById($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_profile(Request $request) {
        $this->validate($request, [
            'name' => 'required|string|max:55',
            'email' => 'required|string|email|max:255',
            //'userName' => 'required|alpha_num|max:30',
            'gender' => 'required',
            'phone' => 'numeric',
        ]);
        $id = Auth::User()->id;
        try {
            $user = User::findOrFail($id);
            $msg = 'Profile Updated successfully';
            $user->name = $request->name;
            //$user->username = $request->userName;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->gender = $request->gender;
            $allowedExtensions = ['jpg', 'png', 'gif', 'tif', 'bmp'];
            // upload user avatar
            if ($request->hasFile('avatar')) {
                $destinationPath = public_path('/images/users');
                if (isset($id) && file_exists($destinationPath . '/' . $user->avatar)) {
                    @unlink($destinationPath . '/' . $user->avatar);
                }
                $file = $request->file('avatar');
                $extension = $file->getClientOriginalExtension();
                $fileName = rand(10000, 99999) . '.' . $extension;
                if (in_array($extension, $allowedExtensions)) {

                    $file->move($destinationPath, $fileName);
                }
                $user->avatar = $fileName;
            }
            $user->save();
            return Redirect::back()->with('success', $msg);
        } catch (Exception $ex) {
            return Redirect::back()->with('error', 'Some error occur!! Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        try {
            $user = User::findOrFail($id);
            $destinationPath = public_path('/images/users');
            if (file_exists($destinationPath . '/' . $user->avatar)) {
                @unlink($destinationPath . '/' . $user->avatar);
            }
            $user->delete();
            return Redirect::back()->with('success', 'User Deleted Successfully');
        } catch (Exception $ex) {
            return Redirect::back()->with('error', 'Some error occur!! Please try again.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit_profile() {
        $id = Auth::User()->id;
        $user = User::select('id', 'name', 'username', 'email', 'phone', 'gender', 'avatar')->findOrFail($id);
        return view('user.edit_profile', compact('user'));
    }

    /**
     * Show the form for changing existing password.
     *
     * @return \Illuminate\Http\Response
     */
    public function change_pwd() {
        return view('user.change_pwd');
    }

    /**
     * Update the changed password in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_changed_pwd(Request $request) {
        $this->validate($request, [
            'current-password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $request_data = $request->All();
        $current_password = Auth::User()->password;

        if (Hash::check($request_data['current-password'], $current_password)) {
            $user_id = Auth::User()->id;
            $obj_user = User::find($user_id);
            $obj_user->password = Hash::make($request_data['password']);
            $obj_user->save();
            return redirect()->back()->with("success", "Password changed successfully!");
        } else {
            return redirect()->back()->with("error", "Please enter correct current password");
        }
    }

}
