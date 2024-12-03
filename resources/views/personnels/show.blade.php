@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Détails du Personnel</h1>

    <!-- Card stylisée pour les détails -->
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h3>{{ $personnel->nom }}</h3>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <tbody>
                    <tr>
                        <th class="bg-light text-primary" style="width: 30%;">Nom</th>
                        <td>{{ $personnel->nom }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light text-primary">Poste</th>
                        <td>{{ $personnel->poste }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light text-primary">Téléphone</th>
                        <td>{{ $personnel->telephone }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('personnels.index') }}" class="btn btn-secondary btn-lg">
                <i class="bi bi-arrow-left-circle"></i> Retour à la liste
            </a>
        </div>
    </div>
</div>
@endsection