@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Détails du Médicament</h1>

    <div class="card">
        <div class="card-header">
            <h4>{{ $medicament->nom }}</h4>
        </div>
        <div class="card-body">
            <p><strong>Description:</strong> {{ $medicament->description }}</p>
            <p><strong>Prix:</strong> {{ $medicament->prix }} FCFA</p>
            <p><strong>Quantité disponible:</strong> {{ $medicament->quantite }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('medicaments.index') }}" class="btn btn-secondary">Retour à la liste</a>
        </div>
    </div>
</div>
@endsection