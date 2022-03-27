<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompanyCommissions extends Model {

    protected $table = 'company_commissions';
    protected $fillable = [
        'contract_id', 'quota_id', 'company_id', 'branch_id', 'seller_id', 'value',
        'commission_date', 'period', 'half_installment', 'base_value', 'percentage'
    ];

    public function contract(): BelongsTo {
        return $this->belongsTo(Contracts::class);
    }

    public function quota(): BelongsTo {
        return $this->belongsTo(Quotas::class);
    }

    public function company(): BelongsTo {
        return $this->belongsTo(Companies::class, 'company_id');
    }

    public function branch(): BelongsTo {
        return $this->belongsTo(Branches::class, 'branch_id');
    }

    public function seller(): BelongsTo {
        return $this->belongsTo(User::class, 'seller_id');
    }

}
