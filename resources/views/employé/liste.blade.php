@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="table-container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Liste des employers</h3>
            @if (Auth::user()->role == 'rh')   
                <a href="{{ route('employer.ajout') }}">
                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>Nouveau employer
                    </button>
                </a>
            @endif
        </div>
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
                    @include('employé.data')
                </tbody>
            </table>
        </div>
        <div class="d-flex py-3 justify-content-center">
            {{ $employers->links() }}
        </div>
    </div>
</div>

@endsection
