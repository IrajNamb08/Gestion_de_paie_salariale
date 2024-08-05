@extends('layouts.admin')

@section('content')
    <div class="user-data m-b-30">
        <h3 class="title-3 m-b-30">
            <i class="zmdi zmdi-account-calendar"></i>Liste des Employers
        </h3>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('delete'))
            <div class="alert alert-danger">
                {{ session('delete') }}
            </div>
        @endif
        @if (Auth::user()->role == 'rh')  
            <div class="table-data__tool-right text-right px-3">
                <a href="{{route('employer.ajout')}}">
                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>Nouveau employer
                    </button>
                </a>
            </div>
        @endif
        <div class="table-responsive table-data">
            <table class="table" style="table-layout: fixed;">
                <thead>
                    <tr>
                        <td></td>
                        <td>Nom & Prénom</td>
                        <td>Adresse</td>
                        <td>Télephone</td>
                        <td>Date d'embauche</td>
                        <td>Département</td>
                        <td>Fonction</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employers as $employer)   
                        <tr>
                            <td>
                                <img src="{{ asset('storage/Employer/' . $employer->profil) }}" alt="{{ $employer->nom }}">
                            </td>
                            <td>
                                <div class="table-data__info">
                                    <h6>{{$employer->nom}}</h6>
                                    <h6>{{$employer->prenom}}</h6>
                                </div>
                            </td>
                            <td>
                                <div class="table-data__info">
                                    <h6>{{$employer->adresse}}</h6>
                                </div>
                            </td>
                            <td>
                                <div class="table-data__info">
                                    <h6>{{$employer->telephone}}</h6>
                                </div>
                            </td>
                            <td>
                                <div class="table-data__info">
                                    <h6>{{$employer->dateEmbauche}}</h6>
                                </div>
                            </td>
                            <td>
                                <h6>{{$employer->departement->departement}}</h6>
                            </td>
                            <td>
                                <div class="table-data__info">
                                    <h6>{{$employer->fonction->fonction}}</h6>
                                </div>
                            </td>
                            @if (Auth::user()->role == 'rh')    
                                <td>
                                    <div class="table-data-feature">
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Modifier">
                                            <a href="{{route('employer.edit',$employer->id)}}">
                                            <i class="zmdi zmdi-edit"></i></a>
                                        </button>
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Bulletin de paie">
                                            <a href="{{route('employer.bulletin',$employer->id)}}">
                                            <i class="zmdi zmdi-download"></i></a>
                                        </button>
                                        <form action="{{route('employer.delete',$employer->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="item" type="submit" data-toggle="tooltip" data-placement="top" title="Supprimer">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection