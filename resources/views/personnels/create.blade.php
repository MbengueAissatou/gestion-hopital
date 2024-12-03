@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Ajouter un Nouveau Personnel</h1>

    <!-- Card stylisée -->
    <div class="card shadow-lg">
        <div class="card-body">
            <form action="{{ route('personnels.store') }}" method="POST">
                @csrf

                <!-- Nom -->
                <div class="mb-4">
                    <label for="nom" class="form-label fw-bold">Nom complet</label>
                    <input type="text" id="nom" name="nom"
                        class="form-control rounded-pill px-3 @error('nom') is-invalid @enderror"
                        value="{{ old('nom') }}" placeholder="Entrez le nom complet" required>
                    @error('nom')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Poste -->
                <div class="mb-4">
                    <label for="poste" class="form-label fw-bold">Poste</label>
                    <input type="text" id="poste" name="poste"
                        class="form-control rounded-pill px-3 @error('poste') is-invalid @enderror"
                        value="{{ old('poste') }}" placeholder="Entrez le poste occupé" required>
                    @error('poste')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Téléphone -->
                <div class="mb-4">
                    <label for="telephone" class="form-label fw-bold">Numéro de téléphone</label>
                    <input type="text" id="telephone" name="telephone"
                        class="form-control rounded-pill px-3 @error('telephone') is-invalid @enderror"
                        value="{{ old('telephone') }}" placeholder="Entrez le numéro de téléphone" required>
                    @error('telephone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Boutons -->
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success btn-lg px-4 me-3">
                        <i class="bi bi-person-plus-fill"></i> Ajouter
                    </button>
                    <a href="{{ route('personnels.index') }}" class="btn btn-secondary btn-lg px-4">
                        <i class="bi bi-arrow-left-circle"></i> Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection