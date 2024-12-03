@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Liste du Personnel</h1>

    <!-- Message de succès -->
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Bouton pour ajouter un personnel -->
    <a href="{{ route('personnels.create') }}" class="btn btn-primary mb-3">Ajouter un Personnel</a>

    <!-- Tableau du personnel -->
    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered shadow-sm rounded">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Poste</th>
                    <th>Téléphone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($personnels as $personnel)
                <tr>
                    <td>{{ $personnel->id }}</td>
                    <td>{{ $personnel->nom }}</td>
                    <td>{{ $personnel->poste }}</td>
                    <td>{{ $personnel->telephone }}</td>
                    <td>
                        <!-- Voir -->
                        <a href="{{ route('personnels.show', $personnel) }}" class="btn btn-info btn-sm">Voir</a>
                        <!-- Modifier -->
                        <a href="{{ route('personnels.edit', $personnel) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <!-- Supprimer -->
                        <form action="{{ route('personnels.destroy', $personnel) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce personnel ? Cette action est irréversible.')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Aucun personnel trouvé.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $personnels->links() }}
    </div>
</div>
@endsection