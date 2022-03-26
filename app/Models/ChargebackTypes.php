<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChargebackTypes extends Model {

    protected $table = 'chargeback_types';
    protected $fillable = ['description'];

}
