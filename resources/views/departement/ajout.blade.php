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
                    <h3 class="text-center">Nouveau département</h3>
                </div>
                <hr>
                <form action="{{route('departement.store')}}" method="POST">
                    @csrf
                    <div class="row py-3">
                        <div class="col-12">
                            <label for="x_card_code" class="control-label mb-1">Nom du département</label>
                            <div class="input-group">
                                <input id="departement" name="departement" type="tel" class="form-control cc-cvc" autocomplete="off">
                            </div>
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