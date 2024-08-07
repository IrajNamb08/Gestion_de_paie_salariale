@extends('layouts.admin')
@section('content')
    {{-- <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-center">EMPLOYER</div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center">Nouveau employé</h3>
                </div>
                <hr>
                <form action="{{route('employer.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row py-3">
                        <div class="col-12">
                            <label for="x_card_code" class="control-label mb-1">Nom</label>
                            <div class="input-group">
                                <input id="nom" name="nom" type="text" class="form-control cc-cvc" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-12">
                            <label for="x_card_code" class="control-label mb-1">Prénom</label>
                            <div class="input-group">
                                <input id="prenom" name="prenom" type="text" class="form-control cc-cvc" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-12">
                            <label for="x_card_code" class="control-label mb-1">Adresse</label>
                            <div class="input-group">
                                <input id="adresse" name="adresse" type="text" class="form-control cc-cvc" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-12">
                            <label for="x_card_code" class="control-label mb-1">Telephone</label>
                            <div class="input-group">
                                <input id="telephone" name="telephone" type="text" class="form-control cc-cvc" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-9">
                        <input  type="file" name="profil" class="form-control">
                    </div>
                    <div class="row form-group  py-3">
                        <div class="col col-md-3">
                            <label class=" form-control-label">Sexe</label>
                        </div>
                        <div class="col col-md-9">
                            <div class="form-check-inline form-check">
                                <label for="inline-radio1" class="form-check-label ">
                                    <input type="radio"  name="sexe" value="Homme" class="form-check-input">Homme
                                </label>
                                <label for="inline-radio2" class="form-check-label ">
                                    <input type="radio"  name="sexe" value="Femme" class="form-check-input">Femme
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-12">
                            <label for="x_card_code" class="control-label mb-1">CIN</label>
                            <div class="input-group">
                                <input id="cin" name="cin" type="text" class="form-control cc-cvc" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-12">
                            <label for="x_card_code" class="control-label mb-1">Numéro Cnaps</label>
                            <div class="input-group">
                                <input id="numCnaps" name="numCnaps" type="text" class="form-control cc-cvc" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-12">
                            <label for="x_card_code" class="control-label mb-1">Salaire</label>
                            <div class="input-group">
                                <input id="salaire" name="salaire" type="text" class="form-control cc-cvc" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-12">
                            <label for="x_card_code" class="control-label mb-1">Date d'embauche</label>
                            <div class="input-group">
                                <input id="dateEmbauche" name="dateEmbauche" type="date" class="form-control cc-cvc" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group row py-3">
                        <div class="col-12 col-md-9">
                            <label for="select" class=" form-control-label">Selectionnez son département</label>
                            <select name="departement_id" id="departement_id" class="form-control">
                                <option></option>
                                @foreach ($departements as $departement)
                                    <option value="{{$departement->id}}">{{$departement->departement}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group row py-3">
                        <div class="col-12 col-md-9">
                            <label for="select" class=" form-control-label">Selectionnez son fonction</label>
                            <select name="fonction_id" id="fonction_id" class="form-control">       
                            </select>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-lg btn-success btn-block px-3">
                            <i class="fa fa-box fa-lg"></i>&nbsp;
                            <span id="payment-button-amount">Enregistrer</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
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