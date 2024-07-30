<?php

namespace App\Http\Controllers;

use App\Models\Fonction;
use App\Models\Departement;
use Illuminate\Http\Request;
use App\Http\Requests\FonctionRequest;

class FonctionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fonctions = Fonction::with('departement')->get();
        return view('fonction.liste',compact('fonctions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departements = Departement::all();
        return view('fonction.ajout',compact('departements'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FonctionRequest $request)
    {
        Fonction::create($request->all());
        return redirect()->route('fonction.index')->with('success','Fonction ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fonction $fonction)
    {
        $departements = Departement::all();
        return view('fonction.edit',compact('departements','fonction'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(FonctionRequest $request, Fonction $fonction)
    {
        $fonction->update($request->all());
        return redirect()->route('fonction.index')->with('success','Fonction mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
