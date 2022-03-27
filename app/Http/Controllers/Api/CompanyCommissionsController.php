<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyCommissionRequest;
use App\Http\Resources\CompanyCommissionResource;
use App\Models\CompanyCommissions;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Request;

class CompanyCommissionsController extends Controller {

    public function index(): JsonResource {
        $companyCommissions = CompanyCommissions::query();

        if (Request::has('contract_id'))
            $companyCommissions->where('contract_id', Request::get('contract_id'));

        if (Request::has('quota_id'))
            $companyCommissions->where('quota_id', Request::get('quota_id'));

        if (Request::has('company_id'))
            $companyCommissions->where('company_id', Request::get('company_id'));

        if (Request::has('branch_id'))
            $companyCommissions->where('branch_id', Request::get('branch_id'));

        if (Request::has('seller_id'))
            $companyCommissions->where('seller_id', Request::get('seller_id'));

        if (Request::has('value'))
            $companyCommissions->where('value', Request::get('value'));

        if (Request::has('commission_date'))
            $companyCommissions->where('commission_date', Request::get('commission_date'));

        if (Request::has('period'))
            $companyCommissions->where('period', Request::get('period'));

        if (Request::has('half_installment'))
            $companyCommissions->where('half_installment', Request::get('half_installment'));

        if (Request::has('base_value'))
            $companyCommissions->where('base_value', Request::get('base_value'));

        if (Request::has('percentage'))
            $companyCommissions->where('percentage', Request::get('percentage'));

        return CompanyCommissionResource::collection($companyCommissions->get());
    }

    public function store(CompanyCommissionRequest $request): JsonResource {
        $companyCommission = new CompanyCommissions();
        $companyCommission->fill($request->validated());
        $companyCommission->save();

        return new CompanyCommissionResource($companyCommission);
    }

    public function show($id): JsonResource {
        return new CompanyCommissionResource(CompanyCommissions::findOrFail($id));
    }

    public function update(CompanyCommissionRequest $request, $id): JsonResource {
        $companyCommission = CompanyCommissions::findOrFail($id);
        $companyCommission->fill($request->validated());
        $companyCommission->save();

        return new CompanyCommissionResource($companyCommission);
    }

    public function destroy($id): array {
        CompanyCommissions::findOrFail($id)->delete();

        return ['success' => true];
    }

}
