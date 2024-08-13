@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="table-container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Liste des employers</h3>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (Auth::user()->role == 'rh')   
                <a href="{{ route('employer.ajout') }}">
                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>Nouveau employer
                    </button>
                </a>
            @endif
        </div>
        <hr>
        <form action="{{ route('employer.index') }}" method="get" class="form-row align-items-end">
            <div class="form-group col-md-3 mb-2">
                <label for="departement_id" class="form-control-label">Département</label>
                <select name="departement_id" id="departement_id" class="form-control">
                    <option></option>
                    @foreach ($departements as $departement)
                        <option value="{{ $departement->id }}">{{ $departement->departement }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3 mb-2">
                <label for="fonction_id" class="form-control-label">Fonction</label>
                <select name="fonction_id" id="fonction_id" class="form-control">
                </select>
            </div>
            <div class="form-group col-md-2 mb-2 d-flex align-items-strech">
                <button type="submit" class="btn-submit mr-2"><i class="fas fa-search"></i></button>
                <a class="btn btn-secondary d-flex justify-content-center align-items-center" style="width: 56px;border-radius :5px;" href="{{ route('employer.index') }}"><i class="fas fa-sync-alt"></i></a>
            </div>
            <div class="form-group mb-2 col-md-4">
                <input type="text" name="search" class="form-control" id="search" placeholder="search.....">
            </div>
        </form>
        <hr>
        <div class="table-responsive">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Matricule</th>
                        <th scope="col">Nom & Prénom</th>
                        <th scope="col">Télephone</th>
                        <th scope="col">Département</th>
                        <th scope="col">Fonction</th>
                        <th scope="col" class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @include('employer.data')
                </tbody>
            </table>
        </div>
        <div class="d-flex py-3 justify-content-center">
            {{ $employers->links() }}
        </div>
    </div>
</div>

@endsection
