<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role','!=',0)->get();
        return view('drh.liste',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('drh.ajout');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $user = new User();
        $user->nom = $request->nom;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('drh.liste')->with('success','Utilisateur enregistré voir dans la liste des utilisateurs');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('drh.edit',compact('user'));
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::findOrfail($id);
        $user->nom = $request->nom;
        $user->nom = $request->nom;
        $user->email = $request->email;
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->role = $request->role;
        $user->save();
        return redirect()->route('drh.liste')->with('success','Utilisateur mis à jour avec succèss');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrfail($id);
        $user->delete();
        return redirect()->route('drh.liste')->with('delete','Utilisateur supprimé');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        if(Auth::user()->id !== $user->id){
            return response()->json("Pas d'accès");
        }
        return view('users.profil',compact('user'));
    }

    public function profilUpdate(UserRequest $request, $id)
    {
        $user = User::findOrfail($id);
        if(Auth::user()->id !== $user->id){
            return response()->json("Pas d'accès");
        }
        $user->nom = $request->nom;
        $user->email = $request->email;
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        if(!empty($request->role)){
            $user->role = $request->role;
        }
        if($request->hasFile('usersimage')){
            if($user->usersimage){
                Storage::disk('public')->delete('User/' . $user->usersimage);
            }
            $usersimage = $request->file('usersimage');
            $imageName = Str::slug($request->usersimage). '.' . $usersimage->getClientOriginalExtension();
            $path = $usersimage->storeAs('user',$imageName,'public');
            $user->usersimage = $imageName;
        }
        $user->save();
        return redirect()->route('user.edit', $user->id)->with('success', 'Compte mis à jour avec succès.');
    }
}
