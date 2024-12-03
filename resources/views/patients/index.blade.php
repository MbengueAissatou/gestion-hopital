@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Liste des Patients</h1>

    <a href="{{ route('patients.create') }}" class="btn btn-success mb-3">
        <i class="fas fa-plus-circle"></i> Ajouter un patient
    </a>

    <table class="table table-striped table-hover table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de Naissance</th>
                <th>Genre</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Adresse</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($patients as $patient)
            <tr>
                <td>{{ $patient->id }}</td>
                <td>{{ $patient->first_name }}</td>
                <td>{{ $patient->last_name }}</td>
                <td>{{ $patient->date_of_birth }}</td>
                <td>{{ $patient->gender }}</td>
                <td>{{ $patient->phone }}</td>
                <td>{{ $patient->email }}</td>
                <td>{{ $patient->address }}</td>
                <td>
                    <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-sm btn-primary" title="Voir">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-sm btn-warning"
                        title="Modifier">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Êtes-vous sûr(e) de vouloir supprimer le patient : {{ $patient->first_name }} ?')">
                            <i class="fas fa-trash"></i> Supprimer
                        </button>
                    </form>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $patients->links() }}
    </div>
</div>
@endsection