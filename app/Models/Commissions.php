<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Commissions extends Model {

    protected $table = 'commissions';
    protected $fillable = [
        'company_commission_id', 'commission_rule_id', 'value'
    ];

    public function company_commission(): BelongsTo {
        return $this->belongsTo(CompanyCommissions::class);
    }

    public function commission_rule(): BelongsTo {
        return $this->belongsTo(CommissionRules::class);
    }

}
