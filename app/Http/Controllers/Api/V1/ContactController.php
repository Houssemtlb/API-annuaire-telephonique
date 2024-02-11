<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\contact;
use App\Http\Requests\V1\StorecontactRequest;
use App\Http\Requests\V1\UpdatecontactRequest;
use App\Http\Resources\V1\ContactCollection;
use App\Http\Resources\V1\ContactResource;
use App\Models\entreprise;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ContactCollection(contact::all());
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
    public function store(StorecontactRequest $request)
    {
        $entrepriseIdInRequest = $request->input('entreprise_id');
        $entrepriseParent = entreprise::where('id',$entrepriseIdInRequest)->first();
        
        if(auth()->user()->role == 'admin'){
            return new ContactResource(contact::create($request->all()));
        }else if(Auth::id() == $entrepriseParent->user_id ){
            return new ContactResource(contact::create($request->all()));
        }else{
            return response()->json(['message' => 'Unauthorised'], 401);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(contact $contact)
    {
        return new ContactResource($contact);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecontactRequest $request, contact $contact)
    {
        $entrepriseIdInRequest = $request->input('entreprise_id');
        $entrepriseParent = entreprise::where('id',$entrepriseIdInRequest)->first();
        
        if(auth()->user()->role == 'admin'){
            $contact->update($request->all());
        }else if(Auth::id() == $entrepriseParent->user_id ){
            $contact->update($request->all());
        }else{
            return response()->json(['message' => 'Unauthorised'], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(contact $contact)
    {

        $entreprise = $contact->entreprise()->first();
        
        if(auth()->user()->role == 'admin'){
            try {
                $contact->delete();
                return response()->json(['message' => 'Contact deleted successfully'], 200);
    
            } catch (\Exception $e) {
                
                return response()->json(['message' => 'Failed to delete Contact'], 500);
            }
        }else if(Auth::id() == $entreprise->user_id ){
            try {
                $contact->delete();
                return response()->json(['message' => 'Contact deleted successfully'], 200);
    
            } catch (\Exception $e) {
                
                return response()->json(['message' => 'Failed to delete Contact'], 500);
            }
        }else{
            return response()->json(['message' => 'Unauthorised'], 401);
        }

    }
}
