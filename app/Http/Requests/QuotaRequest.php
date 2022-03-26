<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuotaRequest extends FormRequest {

    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'contract_id' => ['required', 'numeric', 'exists:contracts,id'],
            'customer_id' => ['required', 'numeric', 'exists:customers,id'],
            'company_id' => ['required', 'numeric', 'exists:companies,id'],
            'branch_id' => ['required', 'numeric', 'exists:branches,id'],
            'seller_id' => ['required', 'numeric', 'exists:users,id'],
            'consortium_type_id' => ['required', 'numeric', 'exists:consortium_types,id'],
            'credit' => ['required', 'numeric'],
            'installments_paid' => ['nullable', 'numeric'],
            'group' => ['required', 'string'],
            'quota' => ['required', 'string'],
            'date_contemplation' => ['required', 'date'],
            'date_sale' => ['required', 'date'],
            'type_sale' => ['required', 'string']
        ];
    }

}
