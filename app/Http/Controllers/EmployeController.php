<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Fonction;
use App\Models\Departement;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Requests\EmployerRequest;
use Illuminate\Support\Facades\Storage;


class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  
    public function index(Request $request)
    {
        $query = Employer::query();

        if ($request->filled('departement_id')) {
            $query->where('departement_id', $request->departement_id);
        }
    
        if ($request->filled('fonction_id')) {
            $query->where('fonction_id', $request->fonction_id);
        }
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('nom', 'like', '%' . $request->search . '%')
                  ->orWhere('prenom', 'like', '%' . $request->search . '%')
                  ->orWhereHas('departement', function($query) use ($request) {
                      $query->where('departement', 'like', '%' . $request->search . '%');
                  })
                  ->orWhereHas('fonction', function($query) use ($request) {
                      $query->where('fonction', 'like', '%' . $request->search . '%');
                  });
            });
        }
        $employers = $query->paginate(5); // Affichez 5 employeurs par page
        if ($request->ajax()) {
            return response()->json([
                'html' => view('employer.data', compact('employers'))->render(),
                'pagination' => $employers->links()->render(),
            ]);
        }

        $departements = Departement::all();
        return view('employer.liste', compact('employers','departements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departements = Departement::all();
        return view('employer.ajout',compact('departements'));
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
        $employer->contrat = $request->contrat;
        $employer->email = $request->email;
        $employer->cin = $request->cin;
        $employer->numCnaps = $request->numCnaps;
        $employer->salaire = $request->salaire;
        $employer->departement_id = $request->departement_id;
        $employer->fonction_id = $request->fonction_id;

        $departement = Departement::find($request->departement_id);
        $departementCode = strtoupper(substr($departement->departement, 0, 2));
        $randomCode = str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
        $cinCode = substr($request->cin, -2);
        $matricule = $departementCode . $cinCode . $randomCode;

        // Vérifier l'unicité de la matricule
        while (Employer::where('matricule', $matricule)->exists()) {
            $randomCode = str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
            $matricule = $departementCode . $cinCode . $randomCode;
        }

        if($request->has('profil')){
            $profil = $request->file('profil');
            $imageName = $request->nom.Str::slug($request->profil). '.' . $profil->getClientOriginalExtension();
            $path = $profil->storeAs('Employer',$imageName,'public');
            $employer->profil = $imageName;
        }
        $employer->matricule = $matricule;
        $employer->dateEmbauche = $request->dateEmbauche;

        $employer->save();
        return redirect()->route('employer.index')->with('success','employer ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $employer = Employer::findOrFail($id);
        $departements = Departement::all();
        $fonctions = Fonction::all();
        return view('employer.edit', compact('departements','fonctions','employer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployerRequest $request, $id)
    {
        $employer = Employer::findOrFail($id);
        $employer->nom = $request->nom;
        $employer->email = $request->email;
        $employer->contrat = $request->contrat;
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
        return redirect()->route('employer.index')->with('success','employer mis à jour');
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
        return redirect()->route('employer.index')->with('delete','employer supprimé');
    }

    public function getBulletins($id)
    {
        $employer = Employer::with('bulletinPaies')->findOrFail($id);
        // Formater les dates des bulletins de paie
        foreach ($employer->bulletinPaies as $bulletin) {
            $bulletin->mois = ucfirst(Carbon::parse($bulletin->mois)->locale('fr_FR')->isoFormat('MMMM YYYY'));
        }
    
        return view('employer.bulletins', compact('employer'));
    }
}
