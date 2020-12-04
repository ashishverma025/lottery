<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model {

    protected $fillable = [
        'subjects_name', 'status', 'created_at',
    ];

    public function getRole($roleId) {
//         syllabus as s ON s.subject_id = sl.id
        $Role = "";
        if(!empty($roleId)){
            $Role = DB::table('role as r')
                    ->select('*')
                    ->where('r.id',$roleId)
                    ->get();
        }
        return $Role ? $Role->name : "";
    }

}
