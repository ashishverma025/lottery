<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditScore extends Model {

    protected $fillable = [
        'amount', 'type', 'use_status',
    ];

}
