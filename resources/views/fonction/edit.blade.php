@extends('layouts.admin')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-center">FONCTION</div>
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
                    <h3 class="text-center">Nouvelle fonction</h3>
                </div>
                <hr>
                <form action="{{route('fonction.update',$fonction->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row py-3">
                        <div class="col-12">
                            <label for="x_card_code" class="control-label mb-1">Nom du fonction</label>
                            <div class="input-group">
                                <input id="fonction" name="fonction" value="{{$fonction->fonction}}" type="tel" class="form-control cc-cvc" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group row py-3">
                        <div class="col-12 col-md-9">
                            <label for="select" class=" form-control-label">Selectionnez son département</label>
                            <select name="departement_id" id="departement_id" class="form-control">
                                <option></option>
                                @foreach ($departements as $departement)
                                    <option value="{{ $departement->id }}" {{ $fonction->departement_id == $departement->id ? 'selected' : '' }}>{{$departement->departement}}</option>
                                @endforeach
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