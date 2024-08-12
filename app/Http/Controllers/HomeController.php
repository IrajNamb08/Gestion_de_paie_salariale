<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employer;
use App\Models\Fonction;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employer = Employer::all()->count();
        $departement = Departement::all()->count();
        $fonctionCount = Fonction::all()->count();
        $totalSalaires = Employer::sum('salaire');
        $totalCDI = Employer::where('contrat', 'CDI')->count();
        $totalCDD = Employer::where('contrat', 'CDD')->count();
        $topSalaries = Employer::with('fonction')
        ->orderBy('salaire', 'desc') 
        ->take(5)
        ->get();

        $percentCDI = $employer ? ($totalCDI / $employer) * 100 : 0;
        $percentCDD = $employer ? ($totalCDD / $employer) * 100 : 0;
        return view('home',compact('employer','departement','fonctionCount','totalSalaires','percentCDI', 'percentCDD','topSalaries'));
    }
    
    public function rhHome()
    {
        $employer = Employer::all()->count();
        $departement = Departement::all()->count();
        $fonctionCount = Fonction::all()->count();
        $totalSalaires = Employer::sum('salaire');
        $totalCDI = Employer::where('contrat', 'CDI')->count();
        $totalCDD = Employer::where('contrat', 'CDD')->count();
        $topSalaries = Employer::with('fonction')
        ->orderBy('salaire', 'desc') 
        ->take(5)
        ->get();

        $percentCDI = $employer ? ($totalCDI / $employer) * 100 : 0;
        $percentCDD = $employer ? ($totalCDD / $employer) * 100 : 0;
        return view('rhHome',compact('employer','departement','fonctionCount','totalSalaires','percentCDI', 'percentCDD','topSalaries'));
    }

    public function dgHome()
    {
        $employer = Employer::all()->count();
        $departement = Departement::all()->count();
        $fonctionCount = Fonction::all()->count();
        $totalSalaires = Employer::sum('salaire');
        $totalCDI = Employer::where('contrat', 'CDI')->count();
        $totalCDD = Employer::where('contrat', 'CDD')->count();
        $topSalaries = Employer::with('fonction')
        ->orderBy('salaire', 'desc') 
        ->take(5)
        ->get();

        $percentCDI = $employer ? ($totalCDI / $employer) * 100 : 0;
        $percentCDD = $employer ? ($totalCDD / $employer) * 100 : 0;
        return view('dgHome',compact('employer','departement','fonctionCount','totalSalaires','percentCDI', 'percentCDD','topSalaries'));
    }

    public function dafHome()
    {
        $employer = Employer::all()->count();
        $departement = Departement::all()->count();
        $fonctionCount = Fonction::all()->count();
        $totalSalaires = Employer::sum('salaire');
        $totalCDI = Employer::where('contrat', 'CDI')->count();
        $totalCDD = Employer::where('contrat', 'CDD')->count();
        $topSalaries = Employer::with('fonction')
        ->orderBy('salaire', 'desc') 
        ->take(5)
        ->get();

        $percentCDI = $employer ? ($totalCDI / $employer) * 100 : 0;
        $percentCDD = $employer ? ($totalCDD / $employer) * 100 : 0;
        return view('dafHome',compact('employer','departement','fonctionCount','totalSalaires','percentCDI', 'percentCDD','topSalaries'));
    }
    public function accueil()
    {
        $user = Auth::user();

        if ($user->role == 'rh') {
            return redirect()->route('rh.home');
        } elseif ($user->role == 'dg') {
            return redirect()->route('dg.home');
        } elseif ($user->role == 'daf') {
            return redirect()->route('daf.home');
        } else {
            // Par défaut, rediriger vers l'accueil de l'utilisateur
            return redirect()->route('home');
        }
    }
}
