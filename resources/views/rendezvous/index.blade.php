@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Liste des Rendez-Vous</h1>
    <a href="{{ route('rendezvous.create') }}" class="btn btn-primary mb-3">Ajouter un Rendez-Vous</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover shadow-lg">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Patient</th>
                    <th>Médecin</th>
                    <th>Date Rendez-vous</th>
                    <th>Status</th>
                    <th>Remarques</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rendezvous as $Rendezvous) <tr>
                    <td>{{ $Rendezvous->id }}</td>
                    <td>{{ $Rendezvous->patient->first_name }}</td>
                    <td>{{ $Rendezvous->medecin->nom }}</td>
                    <td>{{ $Rendezvous->date_rendezvous}}</td>
                    <td>{{ $Rendezvous->status }}</td>
                    <td>{{ $Rendezvous->remarques }}</td>
                    <td>
                        <!-- Voir Rendez-Vous -->
                        <a href="{{ route('rendezvous.show', $rendezvous) }}" class="btn btn-info btn-sm"
                            data-toggle="tooltip" title="Voir les détails">
                            <i class="fas fa-eye"></i>
                        </a>
                        <!-- Modifier Rendez-Vous -->
                        <a href="{{ route('rendezvous.edit', $rendezvous) }}" class="btn btn-warning btn-sm"
                            data-toggle="tooltip" title="Modifier le rendez-vous">
                            <i class="fas fa-edit"></i>
                        </a>
                        <!-- Supprimer Rendez-Vous -->
                        <form action="{{ route('rendezvous.destroy', $rendezvous) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Êtes-vous sûr ?')" data-toggle="tooltip"
                                title="Supprimer ce rendez-vous">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Aucun rendez-vous trouvé.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $rendezvous->links() }}
    </div>
</div>
@endsection