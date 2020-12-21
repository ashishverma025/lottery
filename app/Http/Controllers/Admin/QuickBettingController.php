<?php

namespace App\Http\Controllers\Admin;

use Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Auth;
use DB;
use App\User;
use App\Quickbet;

class QuickBettingController extends Controller {

    /**
     * Show Admin Dashboard.
     * 
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function index($type = null) {
        return view('admin.quickBetting.quick_bet_list', ['type' => $type]);
    }

    //Fetch Quick Betting List Datables Ajax Request
    public function fetchQuickBetting(Request $request) {
        $input = $request->all();
        //pr($input);
        $start = !empty($input['iDisplayStart']) ? $input['iDisplayStart'] : "";   // Offset
        $length = !empty($input['iDisplayLength']) ? $input['iDisplayLength'] : ""; // Limit
        $sSearch = !empty($input['sSearch']) ? $input['sSearch'] : "";            // Search string
        $col = !empty($input['iSortCol_0']) ? $input['iSortCol_0'] : "0";      // Column number for sorting
        $sortType = !empty($input['sSortDir_0']) ? $input['sSortDir_0'] : "DESC";
        $where = '';
        // Datatable column number to table column name mapping
        $arr = ['id', 'user_id', 'bet_name', 'num1', 'num2', 'num3', 'amount', 'num2', 'num5', 'status'];
        $sortBy = $arr[$col];
        // Get the records after applying the datatable filters
        $QuickbetDetails = DB::table('quickbets as qb')
                ->select('qb.*', 'u.name', 'b.bet_name')
                ->leftJoin('users as u', 'u.id', 'qb.user_id')
                ->leftJoin('bettings as b', 'b.id', 'qb.bet_id');

        if (!empty($sSearch)) {
            $QuickbetDetails = $QuickbetDetails
                    ->Where('b.bet_name', 'like', '%' . $sSearch . '%')
                    ->Where('u.name', 'like', '%' . $sSearch . '%');
        }
        $iTotal = $QuickbetDetails;
        $QuickbetDetails = $QuickbetDetails->orderBy($sortBy, $sortType)->limit($length)->offset($start)->get();
//        prd($QuickbetDetails);
        $iTotal = $iTotal->count();
        $response = array(
            'iTotalRecords' => $iTotal,
            'iTotalDisplayRecords' => $iTotal,
            'aaData' => array()
        );

        $k = 0;
        if (count($QuickbetDetails) > 0) {
            foreach ($QuickbetDetails as $inst) {
                $status = $inst->status == "Active" ? "<span class='text-success'>Active</span>" : "<span class='text-danger'>Inactive</span>";
                
                $response['aaData'][$k] = [$k + 1, $inst->name, $inst->bet_name, $inst->num1, $inst->num2, $inst->num3, $inst->num4,$inst->num5,$inst->amount,$inst->created_at, $status];
                $k++;
            }
        }
        return response()->json($response);
    }

    public function deleteBetting($id) {
        try {
            $Betting = Betting::findOrFail($id);
            $destinationPath = public_path('/admin/upload/sunject');

            if (file_exists($destinationPath . '/' . $Betting->institute_logo)) {
                @unlink($destinationPath . '/' . $Betting->institute_logo);
            }
            $Betting->delete();
            set_flash_message('Betting deleted successfully.', 'alert-success');
            return redirect('/admin/betting');
        } catch (Exception $ex) {
            return Redirect::back()->with('error', 'Some error occur!! Please try again.');
            set_flash_message('Some error occur!! Please try again.', 'alert-danger');
        }
    }

}
