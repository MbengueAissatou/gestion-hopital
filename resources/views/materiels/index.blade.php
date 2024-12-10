<div>
    <!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->
</div>@extends('layouts.app')

@section('title', 'Liste des Matériels')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Liste des Matériels</h1>

    <div class="text-end mb-4">
        <a href="{{ route('materiels.create') }}" class="btn btn-success btn-lg">
            <i class="fas fa-plus-circle"></i> Ajouter un Matériel
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Nom</th>
                    <th>Type</th>
                    <th>Quantité</th>
                    <th>État</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($materiels as $materiel)
                <tr>
                    <td>{{ $materiel->nom }}</td>
                    <td>{{ $materiel->type }}</td>
                    <td>{{ $materiel->quantite }}</td>
                    <td><span
                            class="badge bg-{{ $materiel->etat == 'bon' ? 'success' : 'danger' }}">{{ ucfirst($materiel->etat) }}</span>
                    </td>
                    <td>
                        <a href="{{ route('materiels.edit', $materiel) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Modifier
                        </a>

                        <form action="{{ route('materiels.destroy', $materiel) }}" method="POST"
                            style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i> Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $materiels->links() }}
    </div>
</div>
@endsection