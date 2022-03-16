<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\Teams;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $teams = Teams::with('branch')->with('company')->with('desk')->with('manager');

        if(!empty($request->name)){
            $teams->where( 'name', 'like', "%{$request->name}%" );
        }

        if(!empty($request->search)){
            $teams->where( 'name', 'like', "%{$request->search}%" );
        }

        if(!empty($request->company)){
            $teams->where( 'company', $request->company);
        }

        if(!empty($request->branch)){
            $teams->where( 'branch', $request->branch);
        }

        if(!empty($request->desk)){
            $teams->where( 'desk', $request->desk);
        }

        if(!empty($request->manager)){
            $teams->where( 'manager', $request->manager);
        }

        $teams->orderBy('created_at', 'desc');

        $teams = $teams->get();

        return response()->json($teams);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeamRequest $request)
    {
        try{
            if($team = Teams::create($request->all())){
                return response()->json($team);
            }
        }catch(\Exception $error){
            return response()->json(['error' => $error->errorInfo[2]], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teams  $teams
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = teams::with('branch')->with('company')->with('desk')->with('manager')->where('id', $id);

        return response()->json($team ? $team : ['error' => 'Nenhuma equipe encontrada.']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teams  $teams
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateTeamRequest $request)
    {
        try{
            if($team = Teams::find($id)){
                if($team->update($request->all())){
                    return response()->json($team);
                }
            }
        }catch(\Exception $error){
            return response()->json(['error' => $error->errorInfo[2]], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teams  $teams
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            if($team = Teams::find($id)){
                if($team->delete()){
                    return response()->json(['success' => 'Equipe removida com sucesso!']);
                }
            }
        }catch(\Exception $error){
            return response()->json(['error' => $error->errorInfo[2]], 422);
        }
    }
}
