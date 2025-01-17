@foreach ($employers as $employer)
    <tr>
        <td style="padding: 0 !important">
            <img src="{{ $employer->profil ? asset('storage/Employer/' . $employer->profil) : asset('vendor/users.png') }}" alt="{{ $employer->nom }}" style="height: 50px;width: 50px !important;border-radius: 50%;object-fit: cover;">
        </td>
        <td>
            {{ $employer->matricule }}
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
                    <button type="submit" class="btn btn-link p-0 m-0" data-toggle="tooltip" data-placement="top" title="Supprimer"
                     onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet employé ?');">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
                <a href="{{ route('employer.bulletin', $employer->id) }}" data-toggle="tooltip" data-placement="top" title="Bulletin de paie">
                    <i class="fas fa-print"></i>
                </a>
            </td>
        @endif
    </tr>
@endforeach
