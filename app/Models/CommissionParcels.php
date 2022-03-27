<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommissionParcels extends Model {

    protected $table = 'commission_parcels';
    protected $fillable = [
        'commission_rule_id', 'parcel_number', 'percentage_to_pay', 'chargeback_percentage'
    ];

    public function commission_rule(): BelongsTo {
        return $this->belongsTo(CommissionRules::class);
    }

}
