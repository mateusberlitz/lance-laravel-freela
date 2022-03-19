<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Companies;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if( !empty($request->only(['name', 'address', 'phone']) )){
            $companies = Companies::where( 'name', 'like', "%{$request->name}%" )->get();
        }else{
            $companies = Companies::all();
        }

        return response()->json($companies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        $companies = new Companies;

        try{
            $company = $companies->create($request->all());

            return response()->json($company);
        }catch(\Exception $e){
            return response()->json(['erro' => $e->errorInfo[2]], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Companies::find($id);

        return response()->json(!empty($company) ? $company: ['erro' => 'Esta empresa não foi encontrada.']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, $id)
    {
        if($company = Companies::find($id)){
            $company->update($request->all());

            return response()->json(['sucesso' => 'Empresa atualizada com sucesso!']);
        }else{
            return response()->json(['erro' => 'Empresa não encontrada.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($company = Companies::find($id)){
            $company->delete();

            return response()->json(['sucesso' => 'Empresa removida com sucesso!']);
        }else{
            return response()->json(['erro' => 'Empresa não encontrada!']);
        }
    }
}
