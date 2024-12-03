@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Modifier les Informations du Personnel</h1>

    <!-- Card stylisée -->
    <div class="card shadow-lg">
        <div class="card-body">
            <form action="{{ route('personnels.update', $personnel) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Nom -->
                <div class="mb-4">
                    <label for="nom" class="form-label fw-bold">Nom complet</label>
                    <input type="text" id="nom" name="nom" class="form-control rounded-pill px-3"
                        value="{{ old('nom', $personnel->nom) }}" placeholder="Entrez le nom complet" required>
                </div>

                <!-- Poste -->
                <div class="mb-4">
                    <label for="poste" class="form-label fw-bold">Poste</label>
                    <input type="text" id="poste" name="poste" class="form-control rounded-pill px-3"
                        value="{{ old('poste', $personnel->poste) }}" placeholder="Entrez le poste occupé" required>
                </div>

                <!-- Téléphone -->
                <div class="mb-4">
                    <label for="telephone" class="form-label fw-bold">Numéro de téléphone</label>
                    <input type="text" id="telephone" name="telephone" class="form-control rounded-pill px-3"
                        value="{{ old('telephone', $personnel->telephone) }}"
                        placeholder="Entrez le numéro de téléphone" required>
                </div>

                <!-- Boutons -->
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success btn-lg px-4 me-3">
                        <i class="bi bi-check-circle"></i> Modifier
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