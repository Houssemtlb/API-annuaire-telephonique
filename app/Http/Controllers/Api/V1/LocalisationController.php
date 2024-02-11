<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\localisation;
use App\Http\Requests\V1\StorelocalisationRequest;
use App\Http\Requests\V1\UpdatelocalisationRequest;
use App\Http\Resources\V1\LocalisationCollection;
use App\Http\Resources\V1\LocalisationResource;
use App\Models\entreprise;
use Illuminate\Support\Facades\Auth;

class LocalisationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new LocalisationCollection(localisation::all());
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
    public function store(StorelocalisationRequest $request)
    {
        $entrepriseIdInRequest = $request->input('entreprise_id');
        $entrepriseParent = entreprise::where('id',$entrepriseIdInRequest)->first();
        
        if(auth()->user()->role == 'admin'){
            return new LocalisationResource(localisation::create($request->all()));
        }else if(Auth::id() == $entrepriseParent->user_id ){
            return new LocalisationResource(localisation::create($request->all()));
        }else{
            return response()->json(['message' => 'Unauthorised'], 401);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(localisation $localisation)
    {
        return new LocalisationResource($localisation);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(localisation $localisation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatelocalisationRequest $request, localisation $localisation)
    {
        $entrepriseIdInRequest = $request->input('entreprise_id');
        $entrepriseParent = entreprise::where('id',$entrepriseIdInRequest)->first();
        
        if(auth()->user()->role == 'admin'){
            $localisation->update($request->all());
        }else if(Auth::id() == $entrepriseParent->user_id ){
            $localisation->update($request->all());
        }else{
            return response()->json(['message' => 'Unauthorised'], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(localisation $localisation)
    {
        $entreprise = $localisation->entreprise()->first();
        
        if(auth()->user()->role == 'admin'){
            try {
                $localisation->delete();
                return response()->json(['message' => 'Localisation deleted successfully'], 200);
    
            } catch (\Exception $e) {
                
                return response()->json(['message' => 'Failed to delete Localisation'], 500);
            }
        }else if(Auth::id() == $entreprise->user_id ){
            try {
                $localisation->delete();
                return response()->json(['message' => 'Localisation deleted successfully'], 200);
    
            } catch (\Exception $e) {
                
                return response()->json(['message' => 'Failed to delete Localisation'], 500);
            }
        }else{
            return response()->json(['message' => 'Unauthorised'], 401);
        }
    }
}
