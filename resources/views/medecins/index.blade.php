@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Liste des Médecins</h1>
    <a href="{{ route('medecins.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Ajouter un Médecin
    </a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Spécialité</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($medecins as $medecin)
                <tr>
                    <td>{{ $medecin->id }}</td>
                    <td>{{ $medecin->nom }}</td>
                    <td>{{ $medecin->specialite }}</td>
                    <td>{{ $medecin->telephone }}</td>
                    <td>{{ $medecin->email }}</td>
                    <td>
                        <a href="{{ route('medecins.show', $medecin) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i> Voir
                        </a>
                        <a href="{{ route('medecins.edit', $medecin) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Modifier
                        </a>
                        <form action="{{ route('medecins.destroy', $medecin) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Êtes-vous sûr(e) de vouloir supprimer le médecin : {{ $medecin->nom }} ?')">
                                <i class="fas fa-trash"></i> Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Aucun médecin trouvé.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $medecins->links() }}
    </div>
</div>
@endsection