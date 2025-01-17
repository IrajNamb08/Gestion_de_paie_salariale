<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function login(Request $request): RedirectResponse
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt(array('email'=>$input['email'], 'password'=>$input['password'])))
        {
            if(auth()->user()->role == 'rh'){
                return redirect()->route('rh.home');
            }else if(auth()->user()->role == 'dg'){
                return redirect()->route('dg.home');
            }else if(auth()->user()->role == 'daf'){
                return redirect()->route('daf.home');
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('login')
            ->with('error','Vérifier votre adresse email et votre mot de passe');
        }
    }
}
