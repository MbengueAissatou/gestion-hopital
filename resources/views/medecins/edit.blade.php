@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Modifier les Détails du Médecin</h1>

    <!-- Card stylisée pour modifier le médecin -->
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h3>Modifier le Médecin</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('medecins.update', $medecin) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror"
                        value="{{ $medecin->nom }}" required>
                    @error('nom')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="specialite" class="form-label">Spécialité</label>
                    <input type="text" name="specialite" id="specialite"
                        class="form-control @error('specialite') is-invalid @enderror"
                        value="{{ $medecin->specialite }}" required>
                    @error('specialite')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="telephone" class="form-label">Téléphone</label>
                    <input type="text" name="telephone" id="telephone"
                        class="form-control @error('telephone') is-invalid @enderror" value="{{ $medecin->telephone }}"
                        required>
                    @error('telephone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror" value="{{ $medecin->email }}"
                        required>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="adresse" class="form-label">Adresse</label>
                    <textarea name="adresse" id="adresse" class="form-control @error('adresse') is-invalid @enderror"
                        rows="4" required>{{ $medecin->adresse }}</textarea>
                    @error('adresse')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    <a href="{{ route('medecins.index') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection