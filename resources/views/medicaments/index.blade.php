@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Liste des Médicaments</h1>
    <a href="{{ route('medicaments.create') }}" class="btn btn-success mb-3">+ Ajouter un Médicament</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prix (FCFA)</th>
                    <th>Quantité</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($medicaments as $medicament)
                <tr>
                    <td class="text-center">{{ $medicament->id }}</td>
                    <td>{{ $medicament->nom }}</td>
                    <td class="text-end">{{ number_format($medicament->prix, 2, ',', ' ') }}</td>
                    <td class="text-center">{{ $medicament->quantite }}</td>
                    <td class="text-center">
                        <!-- Boutons d'actions -->
                        <a href="{{ route('medicaments.show', $medicament) }}" class="btn btn-info btn-sm">
                            <i class="bi bi-eye"></i> Voir
                        </a>
                        <a href="{{ route('medicaments.edit', $medicament) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i> Modifier
                        </a>
                        <form action="{{ route('medicaments.destroy', $medicament) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce médicament ?')">
                                <i class="bi bi-trash"></i> Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Aucun médicament trouvé.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-3">
        {{ $medicaments->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection