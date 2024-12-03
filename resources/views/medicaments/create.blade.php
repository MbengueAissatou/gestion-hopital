@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Ajouter un Nouveau Médicament</h1>

    <!-- Card pour le formulaire -->
    <div class="card shadow-lg">
        <div class="card-body">
            <form action="{{ route('medicaments.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <!-- Nom -->
                    <div class="col-md-6">
                        <label for="nom" class="form-label fw-bold">Nom du médicament</label>
                        <input type="text" name="nom" id="nom" class="form-control"
                            placeholder="Entrez le nom du médicament" required>
                    </div>
                    <!-- Quantité -->
                    <div class="col-md-6">
                        <label for="quantite" class="form-label fw-bold">Quantité</label>
                        <input type="number" name="quantite" id="quantite" class="form-control"
                            placeholder="Entrez la quantité disponible" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- Description -->
                    <div class="col-md-12">
                        <label for="description" class="form-label fw-bold">Description</label>
                        <textarea name="description" id="description" rows="4" class="form-control"
                            placeholder="Entrez une description du médicament" required></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- Prix -->
                    <div class="col-md-6">
                        <label for="prix" class="form-label fw-bold">Prix (FCFA)</label>
                        <input type="number" name="prix" id="prix" class="form-control"
                            placeholder="Entrez le prix en FCFA" required>
                    </div>
                </div>

                <!-- Bouton -->
                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-lg px-4">
                        <i class="bi bi-plus-circle"></i> Ajouter
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection