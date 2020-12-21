<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quickbet extends Model {

    protected $fillable = [
        'id','user_id','bet_name','bet_date','winning_amount','winning_number','announce_winning_amount', 'status'
    ];

}
