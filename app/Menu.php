<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model {

    protected $fillable = [
        'id','title','menu_name','menu_description','menu_date','menu_layout','link', 'parentid'
    ];

}
