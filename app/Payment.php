<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model {

    protected $fillable = [
        'id','user_id','amount','currency','transaction_id', 'status'
    ];

}
