<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommissionRequest;
use App\Http\Resources\CommissionResource;
use App\Models\Commissions;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Request;

class CommissionsController extends Controller {

    public function index(): JsonResource {
        $commissions = Commissions::query();

        if (Request::has('company_commission_id'))
            $commissions->where('company_commission_id', Request::get('company_commission_id'));

        if (Request::has('commission_rule_id'))
            $commissions->where('commission_rule_id', Request::get('commission_rule_id'));

        if (Request::has('value'))
            $commissions->where('value', Request::get('value'));

        return CommissionResource::collection($commissions->get());
    }

    public function store(CommissionRequest $request): JsonResource {
        $commission = new Commissions();
        $commission->fill($request->validated());
        $commission->save();

        return new CommissionResource($commission);
    }

    public function show($id): JsonResource {
        return new CommissionResource(Commissions::findOrFail($id));
    }

    public function update(CommissionRequest $request, $id): JsonResource {
        $commission = Commissions::findOrFail($id);
        $commission->fill($request->validated());
        $commission->save();

        return new CommissionResource($commission);
    }

    public function destroy($id): array {
        Commissions::findOrFail($id)->delete();

        return ['success' => true];
    }

}
