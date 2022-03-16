<?php

namespace App\Http\Requests;

use App\Rules\BranchExists;
use App\Rules\CityExists;
use App\Rules\CompanyExists;
use App\Rules\PaymentCategoryExists;
use App\Rules\UserExists;
use App\Rules\ProviderExists;
use App\Rules\StateExists;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreTeamRequest extends FormRequest
{
    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3',

            'branch' => ['nullable', 'integer', new BranchExists],
            'manager' => ['required', 'integer', new UserExists],
        ];
    }

    public function messages(){
        return [
            'branch.required' => 'Selecione a filial de qual é esta equipe.',
            'branch.integer' => 'Tipo de dado filial para a empresa da filial.',

            'consumer.required' => 'Selecione o gerente desta filial.',
            'consumer.integer' => 'Tipo de dado inválido para o gerente da filial.',
        ];
    }
}
