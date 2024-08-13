@extends('layouts.admin')
@section('content')
    {{-- <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-center">BULLETIN {{$employer->nom}}</div>
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
                    <h3 class="text-center">Nouveau bulletin</h3>
                </div>
                <hr>
                <form action="{{route('bulletin.store',$employer->id)}}" method="POST">
                    @csrf
                    <input type="hidden" name="employer_id" value="{{$employer->id}}">
                    <div class="row py-3">
                        <div class="col-12">
                            <label for="x_card_code" class="control-label mb-1">Salaire brute</label>
                            <div class="input-group">
                                <input id="salaire_brute" name="salaire_brute" readonly type="tel" class="form-control cc-cvc" value="{{number_format($employer->salaire,2)}} Ar">
                            </div>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-12">
                            <label for="x_card_code" class="control-label mb-1">Salaire brute</label>
                            <div class="input-group">
                                <input id="mois" name="mois" type="date" class="form-control cc-cvc" autocomplete="off">
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
    </div> --}}
    <div class="form-container">
        <p><i class="fas fa-user-plus" ></i></p>
        <h3 class="py-1">BULLETIN {{$employer->nom}} {{$employer->prenom}}</h3>
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
        <form action="{{route('bulletin.store',$employer->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="employer_id" value="{{$employer->id}}">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="salaire_brute">Salaire brute</label>
                    <input id="salaire_brute" name="salaire_brute" readonly type="tel" class="form-control" value="{{$employer->salaire}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="mois">Mois du bulletin</label>
                    <input id="mois" name="mois" type="date" class="form-control" autocomplete="off">
                </div>
            </div> 
            <div class="form-group text-right">
                <button type="submit" class="btn-submit">Générer <i class="far fa-plus-square"></i></button>
            </div>
            
        </form>
    </div>
@endsection