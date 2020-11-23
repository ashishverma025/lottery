<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Directpayment extends Model {

    protected $fillable = [
        'id','firstname','lastname', 'status'
    ];

}
