<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractRequest extends FormRequest {

    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'number_contract' => ['required', 'string'],
            'customer_id' => ['required', 'numeric', 'exists:customers,id']
        ];
    }

}
