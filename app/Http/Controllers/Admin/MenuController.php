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

class MenuController extends Controller {

    /**
     * Show Admin Dashboard.
     * 
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function index($type = null) {
        return view('admin.menu.menu_list', ['type' => $type]);
    }

    //Fetch Menu List Datables Ajax Request
    public function fetchMenu(Request $request) {
        $input = $request->all();
        //pr($input);
        $start = !empty($input['iDisplayStart']) ? $input['iDisplayStart'] : "";   // Offset
        $length = !empty($input['iDisplayLength']) ? $input['iDisplayLength'] : ""; // Limit
        $sSearch = !empty($input['sSearch']) ? $input['sSearch'] : "";            // Search string
        $col = !empty($input['iSortCol_0']) ? $input['iSortCol_0'] : "0";      // Column number for sorting
        $sortType = !empty($input['sSortDir_0']) ? $input['sSortDir_0'] : "DESC";
        $where = '';
        // Datatable column number to table column name mapping
        $arr = ['id', 'title', 'menu_name', 'menu_description', 'menu_date', 'menu_layout', 'link', 'parentid','position'];
        $sortBy = $arr[$col];
        // Get the records after applying the datatable filters
        $MenuDetails = Menu::select('*');

        if (!empty($sSearch)) {
            $MenuDetails = $MenuDetails->Where('title', 'like', '%' . $sSearch . '%');
        }
        $iTotal = $MenuDetails;
        $MenuDetails = $MenuDetails->orderBy($sortBy, $sortType)->limit($length)->offset($start)->get();

        $iTotal = $iTotal->count();
        $response = array(
            'iTotalRecords' => $iTotal,
            'iTotalDisplayRecords' => $iTotal,
            'aaData' => array()
        );

        $k = 0;
        if (count($MenuDetails) > 0) {
            foreach ($MenuDetails as $inst) {
                $action = '<a href="addMenu/' . $inst->id . '" '
                        . 'class="delete hidden-xs hidden-sm" title="Edit">'
                        . '<i class="fa fa-edit text-warning"></i></a> &nbsp;'
                        . ' <a href="deleteMenu/' . $inst->id . '"'
                        . ' class="delete hidden-xs hidden-sm" title="Delete"'
                        . 'onclick=\'return confirm("Are you sure you want to delete this user?")\'>'
                        . '<i class="fa fa-trash text-danger"></i></a>';
                $layout = $inst->parentid ? $inst->parentid : 'No Parent';
                $parent = $inst->menu_layout == 0 ? 'Header' : 'Footer';
                $response['aaData'][$k] = [$k + 1, $inst->title, $inst->menu_description, $inst->menu_name, $inst->menu_date, $parent, $layout,$inst->position, $inst->link, $action];
                $k++;
            }
        }
        return response()->json($response);
    }

    //Add/Update MENU BY POST REQUEST
    public function addMenu(Request $request, $id = null) {
        if (Auth::check()) {

            if ($request->isMethod('get')) {
                $MenuDetails = "";
                $button = 'Add';
                if (!empty($id)) {
                    $button = 'Update';
                    $MenuDetails = Menu::where(['id' => $id])->first();
                }
                $parentsList = Menu::select('id', 'menu_name')->whereNull('parentid')->orWhere(['parentid' => 0])->get();
                $positionList = ['0' => 'Left', '1' => 'Middle', '2' => 'Right'];
//                prd($positionList);
                return view('admin.menu.addmenu', ['button' => $button, 'positionList' => $positionList, 'parentsList' => $parentsList, 'MenuDetails' => $MenuDetails]);
            }

            /* ADD/EDIT SUBJECT */
            if ($request->isMethod('post')) {

                $postData = $request->all();
//                prd($postData);
                $menuId = ($request->input('savebtn') == 'Update') ? $id : '';
                $MenuDetails = ($request->input('savebtn') == 'Add') ? new Menu() : Menu::where(['id' => $menuId])->first();


                $MenuDetails->title = !empty($request->input('title')) ? $request->input('title') : $MenuDetails->title;
                $MenuDetails->menu_date = !empty($request->input('menu_date')) ? $request->input('menu_date') : $MenuDetails->menu_date;
                $MenuDetails->menu_name = !empty($request->input('menu_name')) ? $request->input('menu_name') : $MenuDetails->menu_name;
                $MenuDetails->menu_description = !empty($request->input('menu_description')) ? $request->input('menu_description') : $MenuDetails->menu_description;
                $MenuDetails->menu_layout = !empty($request->input('menu_layout')) ? $request->input('menu_layout') : $MenuDetails->menu_layout;
                $MenuDetails->link = !empty($request->input('link')) ? $request->input('link') : $MenuDetails->link;
                $MenuDetails->parentid = !empty($request->input('parentid')) ? $request->input('parentid') : $MenuDetails->parentid;
                $MenuDetails->position = !empty($request->input('position')) ? $request->input('position') : $MenuDetails->position;
//                prd($MenuDetails);


                if (($request->input('savebtn') == 'Add')) {
                    $MenuDetails->created_at = date('Y-m-d H:i:s');
                    ;
                    $MenuDetails->save();
                    set_flash_message('Menu Added Successfully.', 'alert-success');
                } else {
                    $MenuDetails->updated_at = date('Y-m-d H:i:s');
                    $MenuDetails->update();
                    set_flash_message('Menu Updated successfully', 'alert-success');
                }
                return redirect('/admin/menulist');
            }
        }
        return redirect('/admin/addMenu');
    }

    public function deleteMenu($id) {
        try {
            $Menu = Menu::findOrFail($id);
            $Menu->delete();
            set_flash_message('Menu deleted successfully.', 'alert-success');
            return redirect('/admin/menulist');
        } catch (Exception $ex) {
            return Redirect::back()->with('error', 'Some error occur!! Please try again.');
            set_flash_message('Some error occur!! Please try again.', 'alert-danger');
        }
    }

}
