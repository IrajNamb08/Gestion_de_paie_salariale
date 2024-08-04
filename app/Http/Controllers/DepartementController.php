<?php

namespace App\Http\Controllers;

use App\Models\Fonction;
use App\Models\Departement;
use Illuminate\Http\Request;
use App\Http\Requests\DepartementRequest;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departements = Departement::all();
        return view('departement.liste',compact('departements'));
    }

    public function create()
    {
        return view('departement.ajout');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartementRequest $request)
    {
        $departement = new Departement();
        $departement->departement = $request->departement;
        $departement->save();

        return redirect()->route('departement.index')->with('success','Département ajouter avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $departement = Departement::findOrFail($id);
        return view('departement.edit',compact('departement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartementRequest $request,$id)
    {
        $departement = Departement::findOrFail($id);
        $departement->departement = $request->departement;
        $departement->save();
        return redirect()->route('departement.index')->with('success','Mis à jour effectué');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $departement = Departement::findOrFail($id);
        $departement->delete();
        return redirect()->route('departement.index')->with('success','Département supprimer');
    }

    public function getFonction(Request $request)
    {
        $data['fonctions'] = Fonction::where('departement_id',$request->departement_id)->get(['fonction','id']);
        return response()->json($data);
    }
}
