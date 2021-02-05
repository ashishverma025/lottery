<?php

namespace App\Http\Controllers\Admin;

use Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Auth;
use DB;
use App\User;
use App\Menu;
use App\Betting;
use App\Syllabuslist;

class BettingController extends Controller {

    /**
     * Show Admin Dashboard.
     * 
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function index($type = null) {
        return view('admin.betting.bet_list', ['type' => $type]);
    }

    //Fetch Betting List Datables Ajax Request
    public function fetchBetting(Request $request) {
        $input = $request->all();
        //pr($input);
        $start = !empty($input['iDisplayStart']) ? $input['iDisplayStart'] : "";   // Offset
        $length = !empty($input['iDisplayLength']) ? $input['iDisplayLength'] : ""; // Limit
        $sSearch = !empty($input['sSearch']) ? $input['sSearch'] : "";            // Search string
        $col = !empty($input['iSortCol_0']) ? $input['iSortCol_0'] : "0";      // Column number for sorting
        $sortType = !empty($input['sSortDir_0']) ? $input['sSortDir_0'] : "DESC";
        $where = '';
        // Datatable column number to table column name mapping
        $arr = ['id', 'bet_name', 'bet_date', 'start_date', 'end_date', 'betting_amount', 'betting_number', 'announce_winning_number', 'status'];
        $sortBy = $arr[$col];
        // Get the records after applying the datatable filters
        $BettingDetails = Betting::where('user_id', 1);

        if (!empty($sSearch)) {
            $BettingDetails = $BettingDetails->Where('bet_name', 'like', '%' . $sSearch . '%');
        }
        $iTotal = $BettingDetails;
        $BettingDetails = $BettingDetails->orderBy($sortBy, $sortType)->limit($length)->offset($start)->get();

        $iTotal = $iTotal->count();
        $response = array(
            'iTotalRecords' => $iTotal,
            'iTotalDisplayRecords' => $iTotal,
            'aaData' => array()
        );

        $k = 0;
        if (count($BettingDetails) > 0) {
            foreach ($BettingDetails as $inst) {
                $status = $inst->status == "Active" ? "<span class='text-success'>Active</span>" : "<span class='text-danger'>Inactive</span>";
                $action = '<a href="addBetting/' . $inst->id . '" '
                        . 'class="delete hidden-xs hidden-sm" title="Edit">'
                        . '<i class="fa fa-edit text-warning"></i></a> &nbsp;'
                        . ' <a href="deleteBetting/' . $inst->id . '"'
                        . ' class="delete hidden-xs hidden-sm" title="Delete"'
                        . 'onclick=\'return confirm("Are you sure you want to delete this user?")\'>'
                        . '<i class="fa fa-trash text-danger"></i></a>';

                $awn = $inst->announce_winning_number;
                $statusCls = ($awn == 'No' ? 'danger' : 'success');
                $announce_winning_number = ' <a href="announceWinningNumber/' . $inst->id . '"'
                        . ' class="delete hidden-xs hidden-sm" title="Announce Number"'
                        . 'onclick=\'return confirm("Are you sure you want to announce winning number?")\'>'
                        . '<i class="fa fa-bullhorn text-' . $statusCls . '"></i> ' . $awn . ' </a>';

                $response['aaData'][$k] = [$k + 1, $inst->bet_name, $inst->bet_date, $inst->start_number, $inst->end_number, $inst->winning_amount, $status, $action];
                $k++;
            }
        }
        return response()->json($response);
    }

    //Add/Update Betting BY POST REQUEST
    public function saveBetting(Request $request, $id = null) {
        if (Auth::check()) {

            if ($request->isMethod('get')) {
                $BettingDetails = "";
                $button = 'Add';
                if (!empty($id)) {
                    $button = 'Update';
                    $BettingDetails = Betting::where(['id' => $id])->first();
                }
//                                prd($BettingDetails);

                return view('admin.betting.addbet', ['BettingDetails' => $BettingDetails, 'button' => $button]);
            }

            /* ADD/EDIT SUBJECT */
            if ($request->isMethod('post')) {
                $postData = $request->all();
                $betId = ($request->input('savebtn') == 'Update') ? $id : '';
                $BettingDetails = ($request->input('savebtn') == 'Add') ? new Betting() : Betting::where(['id' => $betId])->first();


                $BettingDetails->bet_name = !empty($request->input('bet_name')) ? $request->input('bet_name') : $BettingDetails->bet_name;
                $BettingDetails->bet_description = !empty($request->input('bet_description')) ? $request->input('bet_description') : $BettingDetails->bet_description;
                $BettingDetails->bet_date = !empty($request->input('bet_date')) ? $request->input('bet_date') : $BettingDetails->bet_date;
                $BettingDetails->start_number = !empty($request->input('start_number')) ? $request->input('start_number') : $BettingDetails->start_number;
                $BettingDetails->end_number = !empty($request->input('end_number')) ? $request->input('end_number') : $BettingDetails->end_number;
                $BettingDetails->winning_amount = !empty($request->input('winning_amount')) ? $request->input('winning_amount') : $BettingDetails->winning_amount;
//                $BettingDetails->winning_number = !empty($request->input('winning_number')) ? $request->input('winning_number') : $BettingDetails->winning_number;
//                $BettingDetails->announce_winning_number = !empty($request->input('announce_winning_number')) ? $request->input('announce_winning_number') : $BettingDetails->announce_winning_number;
                $BettingDetails->number_length = !empty($request->input('number_count')) ? $request->input('number_count') : $BettingDetails->number_count;
                $BettingDetails->status = !empty($request->input('status')) ? $request->input('status') : $BettingDetails->status;


                if (($request->input('savebtn') == 'Add')) {
                    $BettingDetails->user_id = 1;
                    $BettingDetails->created_at = date('Y-m-d H:i:s');
                    $BettingDetails->save();
                    set_flash_message('Betting Added Successfully.', 'alert-success');
                } else {
                    $BettingDetails->updated_at = date('Y-m-d H:i:s');
                    $BettingDetails->update();
                    set_flash_message('Betting Updated successfully', 'alert-success');
                }
                return redirect('/admin/betting');
            }
        }
        return redirect('/');
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
