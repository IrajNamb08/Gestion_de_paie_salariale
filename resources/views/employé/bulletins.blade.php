@extends('layouts.admin')

@section('content')
<div class="user-data m-b-30">
    <h3 class="title-3 m-b-30">
        <i class="zmdi zmdi-account-calendar"></i>Liste des bulletins de paies de {{$employer->nom}} {{$employer->prenom}}
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
            <a href="{{route('bulletin.ajout',$employer->id)}}">
                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Générer un nouveau
                </button>
            </a>
        </div>
    @endif
    <div class="col-lg-12">
        <ul class="list-group">
            @if ($employer->bulletinPaies)
                @foreach ($employer->bulletinPaies as $bulletin )
                    <li class="list-group-item list-group-item-success py-3">{{$bulletin->mois}}</li>
                    <button class="item" data-toggle="tooltip" data-placement="top" title="Bulletin de paie">
                        <a href="{{route('bulletin.download',$bulletin->id)}}">
                        <i class="zmdi zmdi-download"></i></a>
                    </button>
                @endforeach
            @else
                <li class="list-group-item list-group-item-danger">Aucun bulletin de paie pour le moment </li>
            @endif
        </ul>
    </div>
</div>
@endsection