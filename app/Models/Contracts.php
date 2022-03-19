<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contracts extends Model {

    protected $table = 'contracts';
    protected $fillable = [
        'number_contract', 'customer_id'
    ];

}
