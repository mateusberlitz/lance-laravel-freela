<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customers extends Model {

    const TYPES_CUSTOMER = [
        'PF' => 'Pessoa Física',
        'PJ' => 'Pessoa Jurídica'
    ];

    protected $table = 'customers';
    protected $fillable = [
        'name', 'email', 'phone', 'cpf_cnpj', 'type_customer', 'birth_date',
        'civil_status', 'city_id', 'cep', 'address', 'neighborhood', 'number'
    ];

    public function city(): BelongsTo {
        return $this->belongsTo(Cities::class);
    }

}
