@extends('layouts.admin')
@section('content')
    <div class="form-container">
        <p><i class="fas fa-briefcase"></i></p>
        <h3 class="py-1">Nouvelle fonction</h3>
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
        <form action="{{route('fonction.store')}}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="fonction">Nom du fonction</label>
                    <input id="fonction" name="fonction" type="text" class="form-control" autocomplete="off">
                </div>
                <div class="form-group col-md-6">
                    <label for="departement_id" class=" form-control-label">Selectionnez son département</label>
                    <select name="departement_id" id="departement_id" class="form-control">
                        <option></option>
                        @foreach ($departements as $departement)
                            <option value="{{$departement->id}}">{{$departement->departement}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group text-right">
                <button type="submit" class="btn-submit btn-lg">Enregistrer <i class="far fa-plus-square"></i></button>
            </div>
        </form>
    </div>
@endsection