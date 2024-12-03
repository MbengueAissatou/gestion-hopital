@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Liste des Consultations</h1>
    <a href="{{ route('consultations.create') }}" class="btn btn-primary mb-3">Ajouter une Consultation</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover shadow-lg">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Patient</th>
                    <th>Médecin</th>
                    <th>Date Consultation</th>
                    <th>Diagnostic</th>
                    <th>Prescription</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($consultations as $consultation)
                <tr>
                    <td>{{ $consultation->id }}</td>
                    <td>{{ $consultation->patient->first_name }}</td>
                    <td>{{ $consultation->medecin->nom }}</td>
                    <td>{{ $consultation->date_consultation }}</td>
                    <td>{{ Str::limit($consultation->diagnostic, 50) }}</td>
                    <td>{{ Str::limit($consultation->prescription, 50) }}</td>
                    <td>
                        <!-- Voir Consultation -->
                        <a href="{{ route('consultations.show', $consultation) }}" class="btn btn-info btn-sm"
                            data-toggle="tooltip" title="Voir les détails">
                            <i class="fas fa-eye"></i>
                        </a>
                        <!-- Modifier Consultation -->
                        <a href="{{ route('consultations.edit', $consultation) }}" class="btn btn-warning btn-sm"
                            data-toggle="tooltip" title="Modifier la consultation">
                            <i class="fas fa-edit"></i>
                        </a>
                        <!-- Supprimer Consultation -->
                        <form action="{{ route('consultations.destroy', $consultation) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Êtes-vous sûr ?')" data-toggle="tooltip"
                                title="Supprimer cette consultation">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Aucune consultation trouvée.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $consultations->links() }}
    </div>
</div>
@endsection