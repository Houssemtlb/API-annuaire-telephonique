<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\entreprise;
use App\Models\categorie;
use App\Http\Requests\V1\StoreentrepriseRequest;
use App\Http\Requests\V1\UpdateentrepriseRequest;
use App\Http\Resources\V1\CategorieCollection;
use App\Http\Resources\V1\EntrepriseCollection;
use App\Http\Resources\V1\EntrepriseResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new EntrepriseCollection(entreprise::all());
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
    public function store(StoreentrepriseRequest $request)
    { 
        $logoPath = null;
        if($request->hasFile('logo')){
            $logoPath = $request->file('logo')->store('logos', 'public');
        }
        $user_id = auth()->user()->id;
        $data = $request->all();
        $data['logo'] = $logoPath;
        $data['user_id'] = $user_id;
        $entreprise = entreprise::create($data);
        return new EntrepriseResource($entreprise);
    }

    /**
     * Display the specified resource.
     */
    public function show(entreprise $entreprise)
    {
        return new EntrepriseResource($entreprise);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(entreprise $entreprise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateentrepriseRequest $request, entreprise $entreprise)
    {
        $logoPath = $entreprise->logo;
        if(auth()->user()->role == 'admin'){
            if($request->hasFile('logo')){
                $logoPath = $request->file('logo')->store('logos', 'public');
            }
            $data = $request->all();
            $data['logo'] = $logoPath;
            $entreprise->update($data);
        }else if(Auth::id() == $entreprise->user_id){
            if($request->hasFile('logo')){
                $logoPath = $request->file('logo')->store('logos', 'public');
            }
            $data = $request->all();
            $data['logo'] = $logoPath;
            $entreprise->update($data);
        }else{
            return response()->json(['message' => 'Unauthorised'], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(entreprise $entreprise)
    {
        try {
            if(auth()->user()->role == 'admin'){
                $entreprise->delete();
                return response()->json(['message' => 'Entreprise deleted successfully'], 200);
            }else if(Auth::id() == $entreprise->user_id){
                $entreprise->delete();
                return response()->json(['message' => 'Entreprise deleted successfully'], 200);
            }else{
                return response()->json(['message' => 'Unauthorised'], 401);
            }
        } catch (\Exception $e) {
            
            return response()->json(['message' => 'Failed to delete Entreprise'], 500);
        }
    }



    public function search(Request $request){
        $validatedData = $request->validate([
            'name' => 'string',
            'categorie_id' => 'string',
            'wilaya' => 'string',
        ]);

        $query = Entreprise::query();

        if ($request->has('name')) {
            $query->where('Raison_sociale', 'like', '%' . $request->input('name') . '%');
        }
        if ($request->has('categorie_id')) {
            $query->where('categorie_id',$request->input('categorieId'));
        }
        if ($request->has('wilaya')) {
            $query->where('Wilaya', 'like', '%' . $request->input('wilaya') . '%');
        }

        $results = $query->get();

        return new EntrepriseCollection($results);
    }

    public function toggleApparaitre(Entreprise $entreprise)
    {
        if(auth()->user()->role == 'admin'){
            $entreprise->update(['Apparaitre' => !$entreprise->Apparaitre]);
            return response()->json(['message' => 'Appearance status toggled successfully']);
        }else if(Auth::id() == $entreprise->user_id){
            $entreprise->update(['Apparaitre' => !$entreprise->Apparaitre]);
            return response()->json(['message' => 'Appearance status toggled successfully']);
        }else{
            return response()->json(['message' => 'Unauthorised'], 401);
        }
    }

}
