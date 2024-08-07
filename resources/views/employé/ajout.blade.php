@extends('layouts.admin')
@section('content')
    <div class="form-container">
        <p><i class="fas fa-user-plus" ></i></p>
        <h3 class="py-1">Nouveau Employer</h3>
        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <hr>
        <form action="{{route('employer.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" name="nom" id="nom">
                </div>
                <div class="form-group col-md-6">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" name="prenom" id="prenom">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="adresse">Adresse</label>
                    <input type="text" class="form-control" name="adresse" id="adresse">
                </div>
                <div class="form-group col-md-6">
                    <label for="telephone">N°Télephone</label>
                    <input type="text" class="form-control" id="telephone" name="telephone">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="cin">Numéro CIN</label>
                    <input type="text" class="form-control" id="cin" name="cin">
                </div>
                <div class="form-group col-md-6">
                    <label for="numCnaps">Numéro Cnaps si la personne possède</label>
                    <input type="text" class="form-control" id="numCnaps" name="numCnaps"">
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="salaire">Salaire Brute</label>
                    <input type="text" class="form-control" id="salaire" name="salaire">
                </div>
                <div class="form-group col-md-6">
                    <label for="yourMessage">Date d'embauche</label>
                    <input id="dateEmbauche" name="dateEmbauche" type="date" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group col-md-6">
                    <label for="profil">Image de profil</label>
                    <input type="file" class="form-control-file" name="profil" id="profil">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Sexe</label><br>
                    <label class="custom-radio">
                        <input type="radio" name="sexe" value="Homme">
                        <span>Homme</span>
                    </label>
                    <label class="custom-radio">
                        <input type="radio" name="sexe" value="Femme"">
                        <span>Femme</span>
                    </label>
                </div>
                <div class="form-group col-md-6">
                    <label>Type Contrat</label><br>
                    <label class="custom-radio">
                        <input type="radio" name="contrat" value="cdd">
                        <span>CDD</span>
                    </label>
                    <label class="custom-radio">
                        <input type="radio" name="contrat" value="cdi"">
                        <span>CDI</span>
                    </label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="departement_id" class=" form-control-label">Selectionnez son département</label>
                    <select name="departement_id" id="departement_id" class="form-control">
                        <option></option>
                        @foreach ($departements as $departement)
                            <option value="{{$departement->id}}">{{$departement->departement}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="fonction_id" class=" form-control-label">Selectionnez son fonction</label>
                        <select name="fonction_id" id="fonction_id" class="form-control">       
                    </select>
                </div>
            </div>
            <div class="form-row align-items-center">
                <div class="form-group col-md-4">
                    <label for="matricule">Matricule</label>
                    <input type="text" class="form-control" name="matricule" id="matricule" disabled>
                </div>
                <div class="form-group col-md-6 text-right">
                    <button type="submit" class="btn-submit">Enregistrer <i class="far fa-plus-square"></i></button>
                </div>
            </div>
        </form>
    </div>
@endsection