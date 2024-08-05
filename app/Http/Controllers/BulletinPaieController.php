<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Employer;
use App\Models\BulletinPaie;
use Illuminate\Http\Request;

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
    public function store(Request $request, $id)
    {
        $employer = Employer::findOrFail($id);
        $bulletin = new BulletinPaie();
        $bulletin->employer_id = $request->employer_id;
        $bulletin->salaire_brute = $request->salaire_brute;
        $bulletin->mois = $request->mois;

        $ostie = $request->salaire_brute *0.01;
        $cnaps = $request->salaire_brute *0.01;
        $bulletin->salaire_net = $request->salaire_brute - ($ostie + $cnaps);

        $bulletin->save();
        return redirect()->route('employer.bulletin',$employer->id)->with('success','bulletin okey');
    }
    public function download($id)
    {
        $bulletin = BulletinPaie::find($id);

        $pdf = PDF::loadView('bulletin.pdf', compact('bulletin'));
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
    public function destroy(string $id)
    {
        //
    }
}
