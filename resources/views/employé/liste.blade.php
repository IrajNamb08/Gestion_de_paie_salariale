@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="table-container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Liste des employers</h3>
            @if (Auth::user() == 'rh')   
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
                    @foreach ($employers as $employer)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/Employer/' . $employer->profil) }}" style="height: 50px;width: 50px;border-radius: 50%;object-fit: cover;" alt="{{ $employer->nom }}">
                            </td>
                            <td>
                                12313
                            </td>
                            <td>
                                {{ $employer->nom }}
                                {{ $employer->prenom }}
                            </td>
                            <td>
                                {{ $employer->telephone }}
                            </td>
                            <td class="category">
                                {{ $employer->departement->departement }}
                            </td>
                            <td>
                                {{ $employer->fonction->fonction }}
                            </td>
                            @if (Auth::user()->role == 'rh')
                                <td class="actions text-right">
                                    <a href="{{ route('employer.edit', $employer->id) }}" data-toggle="tooltip" data-placement="top" title="Modifier">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('employer.delete', $employer->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link p-0 m-0" data-toggle="tooltip" data-placement="top" title="Supprimer">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('employer.bulletin', $employer->id) }}" data-toggle="tooltip" data-placement="top" title="Bulletin de paie">
                                        <i class="fas fa-print"></i>
                                    </a>
                                    <!-- Bouton pour ouvrir la modal -->
                                    {{-- <a href="#" data-toggle="modal" data-target="#viewEmployerModal{{ $employer->id }}" data-toggle="tooltip" data-placement="top" title="Voir">
                                        <i class="fas fa-eye"></i>
                                    </a> --}}
                                    <!-- Modal Bootstrap -->
                                    {{-- <div class="modal fade" id="viewEmployerModal{{ $employer->id }}" tabindex="-1" role="dialog" aria-labelledby="viewEmployerModalLabel{{ $employer->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="viewEmployerModalLabel{{ $employer->id }}">Détails de l'employé</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>Nom:</strong> {{ $employer->nom }}</p>
                                                    <p><strong>Prénom:</strong> {{ $employer->prenom }}</p>
                                                    <p><strong>Téléphone:</strong> {{ $employer->telephone }}</p>
                                                    <p><strong>Adresse:</strong> {{ $employer->adresse }}</p>
                                                    <p><strong>CIN:</strong> {{ $employer->cin }}</p>
                                                    <p><strong>Numéro Cnaps:</strong> {{ $employer->numCnaps }}</p>
                                                    <p><strong>Département:</strong> {{ $employer->departement->departement }}</p>
                                                    <p><strong>Fonction:</strong> {{ $employer->fonction->fonction }}</p>
                                                    <p><strong>Salaire:</strong> {{ $employer->salaire }}</p>
                                                    <p><strong>Date d'embauche:</strong> {{ $employer->dateEmbauche }}</p>
                                                    <img src="{{ asset('storage/Employer/' . $employer->profil) }}" style="height: 100px;width: 100px;border-radius: 50%;object-fit: cover;" alt="{{ $employer->nom }}">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
