<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommissionRequest extends FormRequest {

    public function authorize(): bool {
        return false;
    }

    public function rules(): array {
        return [
            'company_commission_id' => ['required', 'numeric', 'exists:company_commissions,id'],
            'commission_rule_id' => ['required', 'numeric', 'exists:commission_rules,id'],
            'value' => ['required', 'numeric']
        ];
    }

}
