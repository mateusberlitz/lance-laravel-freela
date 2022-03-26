<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommissionRuleRequest extends FormRequest {

    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'company_id' => ['required', 'numeric', 'exists:companies,id'],
            'branch_id' => ['required', 'numeric', 'exists:branches,id'],
            'chargeback_type_id' => ['required', 'numeric', 'exists:chargeback_types,id'],
            'half_installment' => ['nullable', 'boolean'],
            'pay_in_contemplation' => ['nullable', 'boolean'],
            'percentage_paid_in_contemplation' => ['required', 'numeric']
        ];
    }

}
