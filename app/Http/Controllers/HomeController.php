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
        return view('home',compact('employer','departement','fonctionCount','totalSalaires'));
    }
    
    public function rhHome()
    {
        $count = User::all()->count();
        return view('rhHome',compact('count'));
    }

    public function dgHome()
    {
        $count = User::all()->count();
        return view('dgHome',compact('count'));
    }

    public function dafHome()
    {
        $count = User::all()->count();
        return view('dafHome',compact('count'));
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
