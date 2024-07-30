@extends('layouts.admin')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-center">DEPARTEMENT</div>
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
                    <h3 class="text-center">Mettre à jour un département</h3>
                </div>
                <hr>
                <form action="{{route('departement.update',$departement->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row py-3">
                        <div class="col-12">
                            <label for="x_card_code" class="control-label mb-1">Nom du département</label>
                            <div class="input-group">
                                <input id="departement" value="{{old('departement', $departement->departement)}}" name="departement" type="tel" class="form-control cc-cvc" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-lg btn-info btn-block px-3">
                            <i class="fa fa-box fa-lg"></i>&nbsp;
                            <span id="payment-button-amount">Mettre à jour</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection