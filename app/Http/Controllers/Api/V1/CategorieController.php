<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\categorie;
use App\Http\Requests\V1\StorecategorieRequest;
use App\Http\Requests\V1\UpdatecategorieRequest;
use App\Http\Resources\V1\CategorieCollection;
use App\Http\Resources\V1\CategorieResource;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new CategorieCollection(categorie::all());
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
    public function store(StorecategorieRequest $request)
    {
        return new CategorieResource(categorie::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(categorie $categorie)
    {
        return new CategorieResource($categorie);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(categorie $categorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecategorieRequest $request, categorie $categorie)
    {
        $categorie->update($request->all());
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(categorie $categorie)
    {
        try {
            $categorie->delete();
            return response()->json(['message' => 'Categorie deleted successfully'], 200);

        } catch (\Exception $e) {
            
            return response()->json(['message' => 'Failed to delete categorie'], 500);
        }
    }
}
