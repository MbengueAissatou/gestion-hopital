@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Détails du Médecin</h1>

    <!-- Tableau pour afficher les détails du médecin -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Champ</th>
                <th>Valeur</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Nom</strong></td>
                <td>{{ $medecin->nom }}</td>
            </tr>
            <tr>
                <td><strong>Spécialité</strong></td>
                <td>{{ $medecin->specialite }}</td>
            </tr>
            <tr>
                <td><strong>Téléphone</strong></td>
                <td>{{ $medecin->telephone }}</td>
            </tr>
            <tr>
                <td><strong>Email</strong></td>
                <td>{{ $medecin->email }}</td>
            </tr>
            <tr>
                <td><strong>Adresse</strong></td>
                <td>{{ $medecin->adresse }}</td>
            </tr>
        </tbody>
    </table>

    <!-- Bouton de retour à la liste -->
    <a href="{{ route('medecins.index') }}" class="btn btn-primary">Retour à la liste</a>
</div>
@endsection