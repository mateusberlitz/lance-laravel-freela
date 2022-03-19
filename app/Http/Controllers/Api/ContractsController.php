<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContractRequest;
use App\Http\Resources\ContractResource;
use App\Models\Contracts;
use Illuminate\Http\Resources\Json\JsonResource;

class ContractsController extends Controller {

    public function index(): JsonResource {
        return ContractResource::collection(Contracts::paginate());
    }

    public function store(ContractRequest $request): JsonResource {
        $contract = new Contracts();
        $contract->fill($request->validated());
        $contract->save();

        return new ContractResource($contract);
    }

    public function show($id): JsonResource {
        return new ContractResource(Contracts::findOrFail($id));
    }

    public function update(ContractRequest $request, $id): JsonResource {
        $contract = Contracts::findOrFail($id);
        $contract->fill($request->validated());
        $contract->save();

        return new ContractResource($contract);
    }

    public function destroy($id): array {
        Contracts::findOrFail($id)->delete();

        return ['success' => true];
    }

}
