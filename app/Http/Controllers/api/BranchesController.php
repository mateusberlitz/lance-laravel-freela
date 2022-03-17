<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use App\Models\Branches;
use App\Models\Cities;
use Illuminate\Http\Request;

class BranchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $branches = Branches::with('company')->with('manager')->with('city')->with('state');

        if(!empty($request->name)){
            $branches->where( 'name', 'like', "%{$request->name}%" );
        }

        if(!empty($request->search)){
            $branches->where( function($or) use ($request){
                $or->orWhere( 'name', 'like', "%{$request->search}%" );
                $or->orWhere( 'email', 'like', "%{$request->search}%" );
            });
        }

        if(!empty($request->company)){
            $branches->where( 'company', $request->company);
        }

        if(!empty($request->manager)){
            $branches->where( 'manager', $request->manager);
        }

        $branches->orderBy('created_at', 'desc');

        $branches = $branches->get();

        return response()->json($branches);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBranchRequest $request)
    {
        try{
            $toCreateBranchData = $request->all();
            $toCreateBranchData['city'] = Cities::where('name', $request->city)->get()->first()->id;

            if($branch = Branches::create($toCreateBranchData)){
                return response()->json($branch);
            }
        }catch(\Exception $error){
            //dd($error);
            return response()->json(['error' => $error->errorInfo[2]], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branches  $branches
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $branch = Branches::with('company')->with('manager')->where('id', $id)->get()->first();

        return response()->json($branch ? $branch : ['error' => 'Nenhuma filial encontrada.']);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branches  $branches
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateBranchRequest $request)
    {
        try{
            if($branch = Branches::find($id)){
                $toCreateBranchData = $request->all();
                $toCreateBranchData['city'] = Cities::where('name', $request->city)->get()->first()->id;

                if($branch->update($toCreateBranchData)){
                    return response()->json($branch);
                }
            }
        }catch(\Exception $error){
            return response()->json(['error' => $error->errorInfo[2]], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branches  $branches
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            if($branch = Branches::find($id)){
                if($branch->delete()){
                    return response()->json(['success' => 'Filial removida com sucesso!']);
                }
            }
        }catch(\Exception $error){
            return response()->json(['error' => $error->errorInfo[2]], 422);
        }
    }
}
