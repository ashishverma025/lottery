<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model {

    protected $fillable = [
        'id','subscription_name','description','question_number', 'status'
    ];

}
