<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Fonction;
use App\Models\Departement;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\EmployerRequest;
use Illuminate\Support\Facades\Storage;


class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employers = Employer::with('departement','fonction')->get();
        return view('employé.liste',compact('employers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departements = Departement::all();
        return view('employé.ajout',compact('departements'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployerRequest $request)
    {
        $employer = new Employer();
        $employer->nom = $request->nom;
        $employer->prenom = $request->prenom;
        $employer->adresse = $request->adresse;
        $employer->telephone = $request->telephone;
        $employer->sexe = $request->sexe;
        $employer->cin = $request->cin;
        $employer->numCnaps = $request->numCnaps;
        $employer->salaire = $request->salaire;
        $employer->departement_id = $request->departement_id;
        $employer->fonction_id = $request->fonction_id;

        if($request->has('profil')){
            $profil = $request->file('profil');
            $imageName = $request->nom.Str::slug($request->profil). '.' . $profil->getClientOriginalExtension();
            $path = $profil->storeAs('Employer',$imageName,'public');
            $employer->profil = $imageName;
        }
        $employer->dateEmbauche = $request->dateEmbauche;

        $employer->save();
        return redirect()->route('employer.index')->with('success','Employé ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $employer = Employer::findOrFail($id);
        $departements = Departement::all();
        $fonctions = Fonction::all();
        return view('employé.edit', compact('departements','fonctions','employer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployerRequest $request, $id)
    {
        $employer = Employer::findOrFail($id);
        $employer->nom = $request->nom;
        $employer->prenom = $request->prenom;
        $employer->adresse = $request->adresse;
        $employer->telephone = $request->telephone;
        $employer->sexe = $request->sexe;
        $employer->cin = $request->cin;
        $employer->numCnaps = $request->numCnaps;
        $employer->salaire = $request->salaire;
        $employer->departement_id = $request->departement_id;
        $employer->fonction_id = $request->fonction_id;
        $employer->dateEmbauche = $request->dateEmbauche;
        if($request->hasFile('profil')){
            if($employer->profil){
                Storage::disk('public')->delete('Employer/' . $employer->profil);
            }
            $profil = $request->file('profil');
            $imageName = $request->nom.Str::slug($request->profil). '.' . $profil->getClientOriginalExtension();
            $path = $profil->storeAs('Employer',$imageName,'public');
            $employer->profil = $imageName;
        }
        $employer->save();
        return redirect()->route('employer.index')->with('success','Employé mis à jour');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $employers = Employer::with('departement','fonction')->get();
        $employer = Employer::findOrFail($id);
        if($employer->profil){
            Storage::disk('public')->delete('Employer/' . $employer->profil);
        }
        $employer->delete();
        return redirect()->route('employer.index')->with('delete','Employé supprimé');
    }

    public function getBulletins($id)
    {
        $employer = Employer::with('bulletinPaies')->findOrFail($id);
        return view('employé.bulletins', compact('employer'));
    }
}
