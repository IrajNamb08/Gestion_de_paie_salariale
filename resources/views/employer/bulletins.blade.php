@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="table-container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Liste des bulletins de paies de {{$employer->nom}} <br> {{$employer->prenom}}</h3>
            @if (Auth::user()->role == 'rh')   
                <a href="{{route('bulletin.ajout',$employer->id)}}">
                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>Générer un nouveau
                    </button>
                </a>
            @endif
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col">Mois</th>
                        <th scope="col" class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($employer->bulletinPaies)
                        @foreach ($employer->bulletinPaies as $bulletin)
                        <tr>
                            <td>
                                {{$bulletin->mois}}
                            </td>
                            @if (Auth::user()->role == 'rh')
                                <td class="actions text-right">
                                    <a href="{{route('bulletin.download',$bulletin->id)}}" data-toggle="tooltip" data-placement="top" title="Télecharger">
                                        <i class="fas fa-download"></i>
                                    </a>
                                    <form action="{{ route('bulletin.delete', $bulletin->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link p-0 m-0" data-toggle="tooltip" data-placement="top" title="Supprimer"
                                         onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet employé ?');">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        {{-- <div class="d-flex py-3 justify-content-center">
            {{ $bulletins->links() }}
        </div> --}}
    </div>
</div>
@endsection