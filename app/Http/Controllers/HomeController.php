<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $user = Auth::user();
        return view('home',compact('user'));
    }
    
    public function rhHome()
    {
        $user = Auth::user();
        return view('rhHome',compact('user'));
    }

    public function dgHome()
    {
        $user = Auth::user();
        return view('dgHome',compact('user'));
    }

    public function dafHome()
    {
        return view('dafHome');
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        dd($user);
    }
}
