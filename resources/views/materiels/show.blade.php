@extends('layouts.app')

@section('title', 'Détails du Matériel')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Détails du Matériel</h1>

    <div class="card shadow-sm">
        <div class="card-header">
            <h3>{{ $materiel->nom }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Type:</strong> {{ $materiel->type }}</p>
            <p><strong>Quantité:</strong> {{ $materiel->quantite }}</p>
            <p><strong>État:</strong> {{ ucfirst($materiel->etat) }}</p>
            <p><strong>Description:</strong></p>
            <p>{{ $materiel->description ?? 'Aucune description disponible' }}</p>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('materiels.index') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Retour à la liste
            </a>
        </div>
    </div>
</div>
@endsection