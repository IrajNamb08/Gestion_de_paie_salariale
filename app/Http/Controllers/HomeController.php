<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('home');
    }

    public function rhHome()
    {
        return view('rhHome');
    }

    public function dgHome()
    {
        return view('dgHome');
    }

    public function dafHome()
    {
        return view('dafHome');
    }
    
}
