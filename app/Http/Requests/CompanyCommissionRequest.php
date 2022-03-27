<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyCommissionRequest extends FormRequest {

    public function authorize(): bool {
        return false;
    }

    public function rules(): array {
        return [
            'contract_id' => ['required', 'numeric', 'exists:contracts,id'],
            'quota_id' => ['required', 'numeric', 'exists:quota,id'],
            'company_id' => ['required', 'numeric', 'exists:companies,id'],
            'branch_id' => ['required', 'numeric', 'exists:branches,id'],
            'seller_id' => ['required', 'numeric', 'exists:users,id'],
            'value' => ['required', 'numeric'],
            'commission_date' => ['required', 'date'],
            'period' => ['required', 'numeric'],
            'half_installment' => ['required', 'boolean'],
            'base_value' => ['required', 'numeric'],
            'percentage' => ['required', 'numeric']
        ];
    }

}
