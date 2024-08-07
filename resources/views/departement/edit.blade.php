@extends('layouts.admin')
@section('content')
    <div class="form-container">
        <p><i class="far fa-building"></i></p>
        <h3 class="py-1">Mise à jour Département</h3>
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
        <form action="{{route('departement.update',$departement->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-row align-items-center">
                <div class="form-group col-md-6">
                    <label for="departement">Nom du département</label>
                    <input id="departement" name="departement" value="{{old('departement', $departement->departement)}}" type="tel" class="form-control" autocomplete="off">
                </div>
                <div class="form-group col-md-6 text-right my-3">
                    <button type="submit" class="btn-submit btn-lg">Mettre à jour <i class="fas fa-pencil-alt"></i></button>
                </div>
            </div>
        </form>
    </div>
@endsection