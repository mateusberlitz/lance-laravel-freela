<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contracts extends Model {

    protected $table = 'contracts';
    protected $fillable = [
        'number_contract', 'customer_id'
    ];

    public function customer(): BelongsTo {
        return $this->belongsTo(Customers::class);
    }

}
