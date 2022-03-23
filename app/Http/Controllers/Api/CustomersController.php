<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customers;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Request;

class CustomersController extends Controller {

    public function index(): JsonResource {
        $customers = Customers::query();

        if (Request::has('name'))
            $customers->where('name', 'like',  '%'.Request::get('name').'%');

        if (Request::has('email'))
            $customers->where('email', Request::get('email'));

        if (Request::has('phone'))
            $customers->where('phone', Request::get('phone'));

        if (Request::has('cpf_cnpj'))
            $customers->where('cpf_cnpj', Request::get('cpf_cnpj'));

        if (Request::has('type_customer'))
            $customers->where('type_customer', Request::get('type_customer'));

        if (Request::has('birth_date'))
            $customers->where('birth_date', Request::get('birth_date'));

        if (Request::has('civil_status'))
            $customers->where('civil_status', Request::get('civil_status'));

        if (Request::has('city_id'))
            $customers->where('city_id', Request::get('city_id'));

        if (Request::has('cep'))
            $customers->where('cep', Request::get('cep'));

        if (Request::has('address'))
            $customers->where('address', Request::get('address'));

        if (Request::has('neighborhood'))
            $customers->where('neighborhood', Request::get('neighborhood'));

        if (Request::has('number'))
            $customers->where('number', Request::get('number'));

        return CustomerResource::collection($customers->get());
    }

    public function store(CustomerRequest $request): JsonResource {
        $customer = new Customers();
        $customer->fill($request->validated());
        $customer->save();

        return new CustomerResource($customer);
    }

    public function show($id): JsonResource {
        return new CustomerResource(Customers::findOrFail($id));
    }

    public function update(CustomerRequest $request, $id): JsonResource {
        $customer = Customers::findOrFail($id);
        $customer->fill($request->validated());
        $customer->save();

        return new CustomerResource($customer);
    }

    public function destroy($id): array {
        Customers::findOrFail($id)->delete();

        return ['success' => true];
    }

}
