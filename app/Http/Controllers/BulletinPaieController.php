<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Employer;
use App\Models\BulletinPaie;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Requests\BulletinPaieRequest;

class BulletinPaieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $employer = Employer::findOrFail($id);
        return view('bulletin.ajout', compact('employer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BulletinPaieRequest $request, $id)
    {
        $employer = Employer::findOrFail($id);
        $bulletin = new BulletinPaie();
        $bulletin->employer_id = $request->employer_id;
        $bulletin->salaire_brute = $request->salaire_brute;
        $bulletin->mois = $request->mois;
        $ostie = $request->salaire_brute *0.01;
        $cnaps = $request->salaire_brute *0.01;
        $bulletin->salaire_brute = $request->salaire_brute - ($ostie + $cnaps);
        $irsa = $this->calculateIrsa($bulletin->salaire_brute);
        $bulletin->salaire_net = $bulletin->salaire_brute - $irsa;

        $bulletin->save();
        return redirect()->route('employer.bulletin',$employer->id)->with('success','Bulletin générer');
    }
    private function calculateIrsa($salaire_brute)
    {
        if ($salaire_brute <= 350000) {
            return 0;
        } elseif ($salaire_brute <= 400000) {
            return max(($salaire_brute - 350000) * 0.05, 2000);
        } elseif ($salaire_brute <= 500000) {
            return max(2500 + ($salaire_brute - 400000) * 0.10, 2000);
        } elseif ($salaire_brute <= 600000) {
            return max(12500 + ($salaire_brute - 500000) * 0.15, 2000);
        } else {
            return max(27500 + ($salaire_brute - 600000) * 0.20, 2000);
        }
    }
    public function download($id)
    {
        $bulletin = BulletinPaie::find($id);
        $ostie = $bulletin->salaire_brute * 0.01;
        $cnaps = $bulletin->salaire_brute * 0.01;
        $mois = ucfirst(Carbon::parse($bulletin->mois)->locale('fr_FR')->isoFormat('MMMM YYYY'));
        $irsa = $this->calculateIrsa($bulletin->salaire_brute);
        $pdf = PDF::loadView('bulletin.pdf', compact('bulletin','ostie','cnaps','irsa','mois'));
        return $pdf->download('bulletin_de_paie_'.$bulletin->employer->nom.$bulletin->mois.'.pdf');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $employer = Employer::findOrFail($id);
        $bulletin = BulletinPaie::findOrFail($id);
        $bulletin->delete();
        return redirect()->route('employer.bulletin',$employer->id)->with('success','Bulletin supprimé');
    }
}
