<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommissionRules extends Model {

    protected $table = 'commission_rules';
    protected $fillable = [
        'company_id', 'branch_id', 'half_installment', 'pay_in_contemplation',
        'percentage_paid_in_contemplation', 'chargeback_type_id'
    ];

    public function company(): BelongsTo {
        return $this->belongsTo(Companies::class, 'company_id');
    }

    public function branch(): BelongsTo {
        return $this->belongsTo(Branches::class, 'branch_id');
    }

    public function chargeback_type(): BelongsTo {
        return $this->belongsTo(ChargebackTypes::class, 'chargeback_type_id');
    }

}
