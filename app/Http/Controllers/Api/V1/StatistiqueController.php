<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\statistique;
use App\Http\Requests\V1\StorestatistiqueRequest;
use App\Http\Requests\V1\UpdatestatistiqueRequest;
use App\Http\Resources\V1\StatistiqueCollection;
use App\Http\Resources\V1\StatistiqueResource;
use App\Models\entreprise;
use Illuminate\Support\Facades\Auth;

class StatistiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new StatistiqueCollection(statistique::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorestatistiqueRequest $request)
    {
        $entrepriseIdInRequest = $request->input('entreprise_id');
        $entrepriseParent = entreprise::where('id',$entrepriseIdInRequest)->first();
        
        if(auth()->user()->role == 'admin'){
            return new StatistiqueResource(statistique::create($request->all()));
        }else if(Auth::id() == $entrepriseParent->user_id ){
            return new StatistiqueResource(statistique::create($request->all()));
        }else{
            return response()->json(['message' => 'Unauthorised'], 401);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(statistique $statistique)
    {
        return new StatistiqueResource($statistique);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(statistique $statistique)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatestatistiqueRequest $request, statistique $statistique)
    {
        $entrepriseIdInRequest = $request->input('entreprise_id');
        $entrepriseParent = entreprise::where('id',$entrepriseIdInRequest)->first();
        
        if(auth()->user()->role == 'admin'){
            $statistique->update($request->all());
        }else if(Auth::id() == $entrepriseParent->user_id ){
            $statistique->update($request->all());
        }else{
            return response()->json(['message' => 'Unauthorised'], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(statistique $statistique)
    {
        $entreprise = $statistique->entreprise()->first();
        
        if(auth()->user()->role == 'admin'){
            try {
                $statistique->delete();
                return response()->json(['message' => 'Statistique deleted successfully'], 200);
    
            } catch (\Exception $e) {
                
                return response()->json(['message' => 'Failed to delete Statistique'], 500);
            }
        }else if(Auth::id() == $entreprise->user_id ){
            try {
                $statistique->delete();
                return response()->json(['message' => 'Statistique deleted successfully'], 200);
    
            } catch (\Exception $e) {
                
                return response()->json(['message' => 'Failed to delete Statistique'], 500);
            }
        }else{
            return response()->json(['message' => 'Unauthorised'], 401);
        }
    }
}
