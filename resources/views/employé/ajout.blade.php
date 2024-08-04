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
    </div>
@endsection