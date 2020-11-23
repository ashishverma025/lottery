<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscriber extends Model {

    protected $fillable = [
        'id','start_date','end_date', 'status'
    ];

}
