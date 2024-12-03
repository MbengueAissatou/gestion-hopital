@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Modifier le Médicament</h1>

    <!-- Card contenant le formulaire -->
    <div class="card shadow-lg">
        <div class="card-body">
            <form action="{{ route('medicaments.update', $medicament->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <!-- Nom -->
                    <div class="col-md-6">
                        <label for="nom" class="form-label fw-bold">Nom du médicament</label>
                        <input type="text" name="nom" id="nom" class="form-control"
                            value="{{ old('nom', $medicament->nom) }}" placeholder="Entrez le nom du médicament"
                            required>
                    </div>
                    <!-- Quantité -->
                    <div class="col-md-6">
                        <label for="quantite" class="form-label fw-bold">Quantité</label>
                        <input type="number" name="quantite" id="quantite" class="form-control"
                            value="{{ old('quantite', $medicament->quantite) }}" placeholder="Entrez la quantité"
                            required>
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- Description -->
                    <div class="col-md-12">
                        <label for="description" class="form-label fw-bold">Description</label>
                        <textarea name="description" id="description" rows="4" class="form-control"
                            placeholder="Entrez une description">{{ old('description', $medicament->description) }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- Prix -->
                    <div class="col-md-6">
                        <label for="prix" class="form-label fw-bold">Prix (FCFA)</label>
                        <input type="number" name="prix" id="prix" class="form-control"
                            value="{{ old('prix', $medicament->prix) }}" placeholder="Entrez le prix en FCFA" required>
                    </div>
                </div>

                <!-- Boutons -->
                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-lg px-4">
                        <i class="bi bi-check-circle"></i> Mettre à jour
                    </button>
                    <a href="{{ route('medicaments.index') }}" class="btn btn-secondary btn-lg px-4">
                        <i class="bi bi-arrow-left-circle"></i> Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection