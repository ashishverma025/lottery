<?php

namespace App\Http\Middleware;

use App\User;
use Auth,
    DB;
use Closure;

class CheckType {

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role = null) {
        if (!Auth::id()) {
            return redirect('/');
        }
        $userType = getUser_Detail_ByParam('user_type');
//        prd($userType);
        if (!empty($role)) {
            if ($userType != $role) {
                return response()->json('Permission Denied.');
            }
        }
//        return response()->json('Permission Guranted.');
        if ($userType == 4) {
            return redirect('student/dashboard');
        } else if ($userType == 2) {
            return redirect('lc/dashboard');
        } else {
            return redirect('/');
        }

//        if ($request->type == 2) {
//            return response()->json('You have not permission to access this page.');
//        }

        return $next($request);
    }

//    public function handle($request, Closure $next, $role) {
//        if ($this->auth->guest()) {
//            if ($request->ajax()) {
//                return response('Unauthorized.', 401);
//            } else {
//                return redirect()->guest('login');
//            }
//        }
//
//        $userID = Auth::user()->userID();
//
//        if (auth()->check() && auth()->user()->hasRole($userID, $role)) {
//            return $next($request);
//        }
//    }
}
