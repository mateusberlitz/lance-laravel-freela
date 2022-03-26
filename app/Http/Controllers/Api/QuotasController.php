<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuotaRequest;
use App\Http\Resources\QuotaResource;
use App\Models\Quotas;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Request;

class QuotasController extends Controller {

    public function index(): JsonResource {
        $quotas = Quotas::query();

        if (Request::has('contract_id'))
            $quotas->where('contract_id', Request::get('contract_id'));

        if (Request::has('customer_id'))
            $quotas->where('customer_id', Request::get('customer_id'));

        if (Request::has('company_id'))
            $quotas->where('company_id', Request::get('company_id'));

        if (Request::has('branch_id'))
            $quotas->where('branch_id', Request::get('branch_id'));

        if (Request::has('seller_id'))
            $quotas->where('seller_id', Request::get('seller_id'));

        if (Request::has('credit'))
            $quotas->where('credit', Request::get('credit'));

        if (Request::has('installments_paid'))
            $quotas->where('installments_paid', Request::get('installments_paid'));

        if (Request::has('group'))
            $quotas->where('group', Request::get('group'));

        if (Request::has('quota'))
            $quotas->where('quota', Request::get('quota'));

        if (Request::has('date_contemplation'))
            $quotas->where('date_contemplation', Request::get('date_contemplation'));

        if (Request::has('date_sale'))
            $quotas->where('date_sale', Request::get('date_sale'));

        if (Request::has('type_sale'))
            $quotas->where('type_sale', Request::get('type_sale'));

        if (Request::has('consortium_type_id'))
            $quotas->where('consortium_type_id', Request::get('consortium_type_id'));

        return QuotaResource::collection($quotas->get());
    }

    public function store(QuotaRequest $request): JsonResource {
        $quota = new Quotas();
        $quota->fill($request->validated());
        $quota->save();

        return new QuotaResource($quota);
    }

    public function show($id): JsonResource {
        return new QuotaResource(Quotas::findOrFail($id));
    }

    public function update(QuotaRequest $request, $id): JsonResource {
        $quota = Quotas::findOrFail($id);
        $quota->fill($request->validated());
        $quota->save();

        return new QuotaResource($quota);
    }

    public function destroy($id): array {
        Quotas::findOrFail($id)->delete();

        return ['success' => true];
    }

}
