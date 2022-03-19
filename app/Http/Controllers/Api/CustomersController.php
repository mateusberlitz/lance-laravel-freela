<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customers;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomersController extends Controller {

    public function index(): JsonResource {
        return CustomerResource::collection(Customers::paginate());
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
