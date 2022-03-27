<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommissionParcelRequest extends FormRequest {

    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'commission_rule_id' => ['required', 'numeric', 'exists:commission_rules,id'],
            'parcel_number' => ['required', 'numeric'],
            'percentage_to_pay' => ['required', 'numeric'],
            'chargeback_percentage' => ['required', 'numeric']
        ];
    }

}
