@extends('layouts.admin')

@section('content')
    <div class="user-data m-b-30">
        <h3 class="title-3 m-b-30">
            <i class="fas fa-briefcase"></i>Liste des Fonctions
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
                <a href="{{route('fonction.ajout')}}">
                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>Nouvelle fonction
                    </button>
                </a>
            </div>
        @endif
        <div class="table-responsive table-data">
            <table class="table">
                <thead>
                    <tr>
                        <td>Fonction</td>
                        <td>Département</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fonctions as $fonction)   
                        <tr>
                            <td>
                                <div class="table-data__info">
                                    <h6>{{$fonction->fonction}}</h6>
                                </div>
                            </td>
                            <td>
                                <h6>{{$fonction->departement->departement}}</h6>
                            </td>
                            @if (Auth::user()->role == 'rh')    
                                <td>
                                    <div class="table-data-feature">
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Modifier">
                                            <a href="{{route('fonction.edit',$fonction->id)}}">
                                            <i class="zmdi zmdi-edit"></i></a>
                                        </button>
                                        <form action="{{route('fonction.delete',$fonction->id)}}" method="POST">
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
            <div class="d-flex py-3 justify-content-center">
                {{ $fonctions->links() }}
            </div>
        </div>
    </div>
@endsection