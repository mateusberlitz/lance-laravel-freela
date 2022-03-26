<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Quotas extends Model {

    protected $table = 'quotas';
    protected $fillable = [
        'contract_id', 'customer_id', 'company_id', 'branch_id', 'seller_id', 'credit',
        'installments_paid', 'group', 'quota', 'date_contemplation', 'date_sale',
        'type_sale', 'consortium_type_id'
    ];

    public function contract(): BelongsTo {
        return $this->belongsTo(Contracts::class);
    }

    public function customer(): BelongsTo {
        return $this->belongsTo(Customers::class);
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

    public function consortium_type(): BelongsTo {
        return $this->belongsTo(ConsortiumTypes::class, 'consortium_type_id');
    }

}
