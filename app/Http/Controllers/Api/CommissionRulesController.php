<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommissionRuleRequest;
use App\Http\Resources\CommissionRuleResource;
use App\Models\CommissionRules;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Request;

class CommissionRulesController extends Controller {

    public function index(): JsonResource {
        $commissionsRules = CommissionRules::query();

        if (Request::has('company_id'))
            $commissionsRules->where('company_id', Request::get('company_id'));

        if (Request::has('branch_id'))
            $commissionsRules->where('branch_id', Request::get('branch_id'));

        if (Request::has('half_installment'))
            $commissionsRules->where('half_installment', Request::get('half_installment'));

        if (Request::has('pay_in_contemplation'))
            $commissionsRules->where('pay_in_contemplation', Request::get('pay_in_contemplation'));

        if (Request::has('percentage_paid_in_contemplation'))
            $commissionsRules->where('percentage_paid_in_contemplation', Request::get('percentage_paid_in_contemplation'));

        if (Request::has('chargeback_type_id'))
            $commissionsRules->where('chargeback_type_id', Request::get('chargeback_type_id'));

        return CommissionRuleResource::collection($commissionsRules->get());
    }

    public function store(CommissionRuleRequest $request): JsonResource {
        $commissionRule = new CommissionRules();
        $commissionRule->fill($request->validated());
        $commissionRule->save();

        return new CommissionRuleResource($commissionRule);
    }

    public function show($id): JsonResource {
        return new CommissionRuleResource(CommissionRules::findOrFail($id));
    }

    public function update(CommissionRuleRequest $request, $id): JsonResource {
        $commissionRule = CommissionRules::findOrFail($id);
        $commissionRule->fill($request->validated());
        $commissionRule->save();

        return new CommissionRuleResource($commissionRule);
    }

    public function destroy($id): array {
        CommissionRules::findOrFail($id)->delete();

        return ['success' => true];
    }

}
