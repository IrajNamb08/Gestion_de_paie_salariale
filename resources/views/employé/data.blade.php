@foreach ($employers as $employer)
    <tr>
        <td>
            <img src="{{ asset('storage/Employer/' . $employer->profil) }}" style="height: 50px;width: 50px;border-radius: 50%;object-fit: cover;" alt="{{ $employer->nom }}">
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
                    <button type="submit" class="btn btn-link p-0 m-0" data-toggle="tooltip" data-placement="top" title="Supprimer">
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