<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommissionRuleRequest;
use App\Http\Resources\CommissionParcelResource;
use App\Models\CommissionParcels;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Request;

class CommissionParcelsController extends Controller {

    public function index(): JsonResource {
        $commissionParcels = CommissionParcels::query();

        if (Request::has('commission_rule_id'))
            $commissionParcels->where('commission_rule_id', Request::get('commission_rule_id'));

        if (Request::has('parcel_number'))
            $commissionParcels->where('parcel_number', Request::get('parcel_number'));

        if (Request::has('percentage_to_pay'))
            $commissionParcels->where('percentage_to_pay', Request::get('percentage_to_pay'));

        if (Request::has('chargeback_percentage'))
            $commissionParcels->where('chargeback_percentage', Request::get('chargeback_percentage'));

        return CommissionParcelResource::collection($commissionParcels->get());
    }

    public function store(CommissionRuleRequest $request): JsonResource {
        $commissionParcel = new CommissionParcels();
        $commissionParcel->fill($request->validated());
        $commissionParcel->save();

        return new CommissionParcelResource($commissionParcel);
    }

    public function show($id): JsonResource {
        return new CommissionParcelResource(CommissionParcels::findOrFail($id));
    }

    public function update(CommissionRuleRequest $request, $id): JsonResource {
        $commissionParcel = CommissionParcels::findOrFail($id);
        $commissionParcel->fill($request->validated());
        $commissionParcel->save();

        return new CommissionParcelResource($commissionParcel);
    }

    public function destroy($id): array {
        CommissionParcels::findOrFail($id)->delete();

        return ['success' => true];
    }

}
