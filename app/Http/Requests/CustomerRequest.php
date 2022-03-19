<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest {

    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric'],
            'cpf_cnpj' => ['required', 'string', 'min:11', 'max:14'],
            'type_customer' => ['required', 'string', 'in:PF,PJ'],
            'birth_date' => ['nullable', 'date'],
            'civil_status' => ['nullable'],
            'city_id' => ['required', 'numeric', 'exists:cities,id'],
            'cep' => ['required', 'string'],
            'address' => ['required', 'string'],
            'neighborhood' => ['required', 'string'],
            'number' => ['required', 'string']
        ];
    }

}
