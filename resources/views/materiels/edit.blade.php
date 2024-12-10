@extends('layouts.app')

@section('title', 'Modifier un Matériel')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Modifier un Matériel</h1>

    <form action="{{ route('materiels.update', $materiel->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" class="form-control" value="{{ old('nom', $materiel->nom) }}"
                        required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" id="type" name="type" class="form-control"
                        value="{{ old('type', $materiel->type) }}" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="quantite">Quantité</label>
                    <input type="number" id="quantite" name="quantite" class="form-control"
                        value="{{ old('quantite', $materiel->quantite) }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="etat">État</label>
                    <select name="etat" id="etat" class="form-control" required>
                        <option value="neuf" {{ old('etat', $materiel->etat) == 'neuf' ? 'selected' : '' }}>Neuf
                        </option>
                        <option value="utilisé" {{ old('etat', $materiel->etat) == 'utilisé' ? 'selected' : '' }}>
                            Utilisé</option>
                        <option value="en réparation"
                            {{ old('etat', $materiel->etat) == 'en réparation' ? 'selected' : '' }}>En Réparation
                        </option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control"
                rows="4">{{ old('description', $materiel->description) }}</textarea>
        </div>

        <div class="form-group text-center mt-4">
            <button type="submit" class="btn btn-warning btn-lg">
                <i class="fas fa-edit"></i> Modifier
            </button>
        </div>
    </form>
</div>
@endsection