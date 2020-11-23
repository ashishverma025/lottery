<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Admin;
use Hash;
use Auth;
use Redirect;
use App\User;
use Config;

class AdminController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function index() {
        return view('admin.dashboard');
    }

    public function settings() {
        $id = Auth::User()->id;
        $getDetail = Admin::select('name', 'username', 'email', 'avatar')->where(['id' => $id])->first();
        return view('admin.edit_profile', ['data' => $getDetail]);
    }

    

    public function update_settings(Request $request) {
        $this->validate($request, [
            'name' => 'required|string|max:55',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id . ',id',
            'username' => 'required|alpha_num|max:30|unique:users,username,' . Auth::user()->id . ',id',
        ]);
        $id = Auth::User()->id;

        $settings = Admin::findOrFail($id);
        $settings->name = $request->name;
        $settings->username = $request->username;
        $settings->email = $request->email;
        $allowedExtensions = ['jpg', 'png', 'gif', 'tif', 'bmp'];
        if ($request->hasFile('avatar')) {
            $destinationPath = public_path('/images/users');
            if (file_exists($destinationPath . '/' . $request->hd_avatar)) {
                @unlink($destinationPath . '/' . $request->hd_avatar);
            }
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $fileName = rand(10000, 99999) . '.' . $extension;
            if (in_array($extension, $allowedExtensions)) {

                $file->move($destinationPath, $fileName);
            }
            $settings->avatar = $fileName;
        }

        $settings->save();
        return Redirect::back()->with('message', 'Settings updated successfully');
    }

    public function change_pwd() {
        return view('admin.change_pwd');
    }

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

    /**
     * Function to update user profile
     * @param void
     * @return array
     */
    public function updateUser(Request $request) {
        // Get the formData
        $userDetails = $request->post();
        $response = [];
        // Server Side Validation
        $validation = Validator::make(
            ['fname' => $userDetails['fname'],
            'email' => $userDetails['email'],
            'contact' => $userDetails['contact'],
            'address' => $userDetails['address'],
        ], [
            'fname' => ['required'],
            'email' => ['required'],
            'contact' => ['required'],
            'address' => ['required'],
        ], [
            'fname.required' => 'Please enter name',
            'email.required' => 'Please enter email',
            'contact.required' => 'Please enter contact',
            'address.required' => 'Please enter address',
        ]
    );

        $image = $request->file('profile_image');

        if ($validation->fails()) {// Some data is not valid as per the defined rules
            $error = $validation->errors()->first();
            if (isset($error) && !empty($error)) {
                $response['resCode'] = 1;
                $response['resMsg'] = $error;
            }
        } else {     // The data is valid, go ahead and save it
            if (empty($userDetails['user_id'])) { // New record, save it
                $User = new User;
                $User->name = $userDetails['fname'] . ' ' . $userDetails['lname'];
                $User->username = $userDetails['fname'] . '_' . $userDetails['lname'];
                $User->fname = $userDetails['fname'];
                $User->lname = $userDetails['lname'];
                $User->email = $userDetails['email'];
                $User->phone = $userDetails['contact'];
                $User->address = $userDetails['address'];
                $User->password = Hash::make(12345);
                $User->address = $userDetails['address'];
                $User->gender = $userDetails['gender'];
                $User->dob = $userDetails['years'] . '-' . $userDetails['months'] . '-' . $userDetails['days'];
//                $User->status = $userDetails['status'];
                $User->created_at = date('Y-m-d H:i:s');

                if ($file = $request->hasFile('user_image')) {
                    $today = date("Ymds");
                    $file = $request->file('user_image');
                    $fileName = $today . $file->getClientOriginalName();
                    $destinationPath = public_path() . config('common.ADMIN_PROFILE_IMG_URL');
                    $file->move($destinationPath, $fileName);
                    $User->profile_image = $fileName;
                }
                if ($User->save()) {
                    $response['resCode'] = 0;
                    $response['resMsg'] = 'User added successfully';
                } else {
                    $response['resCode'] = 2;
                    $response['resMsg'] = 'Internal server error';
                }
            } else {         // Existing record, update it
                $User = Admin::where(['id' => $userDetails['user_id']])->first();
                $User->name = $userDetails['fname'] . ' ' . $userDetails['lname'];
                $User->username = $userDetails['fname'] . '_' . $userDetails['lname'];
                $User->fname = $userDetails['fname'];
                $User->lname = $userDetails['lname'];
                $User->email = $userDetails['email'];
                $User->phone = $userDetails['contact'];
                $User->address = $userDetails['address'];
                $User->gender = $userDetails['gender'];
                $User->dob = $userDetails['years'] . '-' . $userDetails['months'] . '-' . $userDetails['days'];
//                $User->status = $userDetails['status'];
                $User->updated_at = date('Y-m-d H:i:s');

                if ($file = $request->hasFile('user_image')) {
                    $file = $request->file('user_image');
                    $User->avatar = upload_profile_image($userDetails['user_id'], $file);
                }

                if ($User->update()) {
                    $response['resCode'] = 0;
                    $response['resMsg'] = 'User updated successfully';
                } else {
                    $response['resCode'] = 2;
                    $response['resMsg'] = 'Internal server error';
                }
            }
        }
        return response()->json($response);
    }

}
