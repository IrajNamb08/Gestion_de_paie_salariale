@extends('layouts.admin')
@section('content')
    <div class="col-lg-12">
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
    </div>
@endsection