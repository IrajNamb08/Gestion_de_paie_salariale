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
                    <h3 class="text-center">Mettre à jour employé</h3>
                </div>
                <hr>
                <form action="{{route('employer.update',$employer->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row py-3">
                        <div class="col-12">
                            <label for="x_card_code" class="control-label mb-1">Nom</label>
                            <div class="input-group">
                                <input id="nom" name="nom" type="text" value="{{old('nom', $employer->nom)}}" class="form-control cc-cvc" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-12">
                            <label for="x_card_code" class="control-label mb-1">Prénom</label>
                            <div class="input-group">
                                <input id="prenom" name="prenom" type="text" class="form-control cc-cvc" value="{{old('prenom', $employer->prenom)}}" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-12">
                            <label for="x_card_code" class="control-label mb-1">Adresse</label>
                            <div class="input-group">
                                <input id="adresse" name="adresse" type="text" class="form-control cc-cvc" value="{{old('adresse', $employer->adresse)}}" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-12">
                            <label for="x_card_code" class="control-label mb-1">Telephone</label>
                            <div class="input-group">
                                <input id="telephone" name="telephone" type="text" class="form-control cc-cvc" value="{{old('telephone', $employer->telephone)}}" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" name="profil" class="form-control">
                        <div class="mt-3">
                            <img src="{{ asset('storage/Employer/' . $employer->profil) }}" width="100" alt="{{ $employer->nom }}">
                        </div>
                    </div>
                    <div class="row form-group  py-3">
                        <div class="col col-md-3">
                            <label class=" form-control-label">Sexe</label>
                        </div>
                        <div class="col col-md-9">
                            <div class="form-check-inline form-check">
                                <label for="inline-radio1" class="form-check-label ">
                                    <input type="radio"  name="sexe" value="Homme" class="form-check-input" {{ $employer->sexe == 'Homme' ? 'checked' : '' }}>Homme
                                </label>
                                <label for="inline-radio2" class="form-check-label ">
                                    <input type="radio"  name="sexe" value="Femme" class="form-check-input" {{ $employer->sexe == 'Femme' ? 'checked' : '' }}>Femme
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-12">
                            <label for="x_card_code" class="control-label mb-1">CIN</label>
                            <div class="input-group">
                                <input id="cin" name="cin" type="text" class="form-control cc-cvc" value="{{old('cin', $employer->cin)}}" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-12">
                            <label for="x_card_code" class="control-label mb-1">Numéro Cnaps</label>
                            <div class="input-group">
                                <input id="numCnaps" name="numCnaps" type="text" value="{{old('numCnaps', $employer->numCnaps)}}" class="form-control cc-cvc" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-12">
                            <label for="x_card_code" class="control-label mb-1">Salaire</label>
                            <div class="input-group">
                                <input id="salaire" name="salaire" type="text" value="{{old('salaire', $employer->salaire)}}" class="form-control cc-cvc" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-12">
                            <label for="x_card_code" class="control-label mb-1">Date d'embauche</label>
                            <div class="input-group">
                                <input id="dateEmbauche" name="dateEmbauche" value="{{old('dateEmbauche', $employer->dateEmbauche)}}" type="date" class="form-control cc-cvc" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group py-3">
                        <div class="col-12 col-md-9">
                            <label for="departement_id" class="form-control-label">Selectionnez son département</label>
                            <select name="departement_id" id="departement_id" class="form-control">
                                <option value="">--Sélectionnez un département--</option>
                                @foreach ($departements as $departement)
                                    <option value="{{ $departement->id }}" {{ $employer->departement_id == $departement->id ? 'selected' : '' }}>
                                        {{ $departement->departement }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="row form-group py-3">
                        <div class="col-12 col-md-9">
                            <label for="fonction_id" class="form-control-label">Selectionnez son fonction</label>
                            <select name="fonction_id" id="fonction_id" class="form-control">
                                <option value="">--Sélectionnez une fonction--</option>
                                <!-- Les fonctions seront chargées dynamiquement ici -->
                            </select>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-lg btn-success btn-block px-3">
                            <i class="fa fa-box fa-lg"></i>&nbsp;
                            <span id="payment-button-amount">Mettre à jour</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
    <div class="form-container">
        <p><i class="fas fa-user-plus" ></i></p>
        <h3 class="py-1">Mettre à jour l'employer</h3>
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
        <form action="{{route('employer.update',$employer->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" value="{{old('nom', $employer->nom)}}" name="nom" id="nom">
                </div>
                <div class="form-group col-md-6">
                    <label for="prenom">Prénom</label>
                    <input type="text" value="{{old('prenom', $employer->prenom)}}" class="form-control" name="prenom" id="prenom">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="adresse">Adresse</label>
                    <input type="text" class="form-control" value="{{old('adresse', $employer->adresse)}}" name="adresse" id="adresse">
                </div>
                <div class="form-group col-md-6">
                    <label for="telephone">N°Télephone</label>
                    <input type="text" value="{{old('telephone', $employer->telephone)}}" class="form-control" id="telephone" name="telephone">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="cin">Numéro CIN</label>
                    <input type="text" value="{{old('cin', $employer->cin)}}" class="form-control" id="cin" name="cin">
                </div>
                <div class="form-group col-md-6">
                    <label for="numCnaps">Numéro Cnaps si la personne possède</label>
                    <input type="text" value="{{old('numCnaps', $employer->numCnaps)}}" class="form-control" id="numCnaps" name="numCnaps"">
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="salaire">Salaire Brute</label>
                    <input type="text" value="{{old('salaire', $employer->salaire)}}" class="form-control" id="salaire" name="salaire">
                </div>
                <div class="form-group col-md-6">
                    <label for="yourMessage">Date d'embauche</label>
                    <input id="dateEmbauche" value="{{old('dateEmbauche', $employer->dateEmbauche)}}" name="dateEmbauche" type="date" class="form-control">
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
                    <img src="{{ asset('storage/Employer/' . $employer->profil) }}" width="100" alt="{{ $employer->nom }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Sexe</label><br>
                    <label class="custom-radio">
                        <input type="radio" name="sexe" {{ $employer->sexe == 'Homme' ? 'checked' : '' }} value="Homme">
                        <span>Homme</span>
                    </label>
                    <label class="custom-radio">
                        <input type="radio" name="sexe" {{ $employer->sexe == 'Femme' ? 'checked' : '' }} value="Femme">
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
                            <option value="{{ $departement->id }}" {{ $employer->departement_id == $departement->id ? 'selected' : '' }}>{{$departement->departement}}</option>
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
                    <button type="submit" class="btn-submit">Mettre à jour <i class="fas fa-user-edit"></i></button>
                </div>
            </div>
        </form>
    </div>
@endsection