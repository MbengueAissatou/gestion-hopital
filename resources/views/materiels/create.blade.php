@extends('layouts.app')

@section('title', 'Ajouter un Matériel')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Ajouter un Matériel</h1>

    <form action="{{ route('materiels.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" id="type" name="type" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="quantite">Quantité</label>
                    <input type="number" id="quantite" name="quantite" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="etat">État</label>
                    <select name="etat" id="etat" class="form-control" required>
                        <option value="neuf">Neuf</option>
                        <option value="utilisé">Utilisé</option>
                        <option value="en réparation">En Réparation</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" rows="4"></textarea>
        </div>

        <div class="form-group text-center mt-4">
            <button type="submit" class="btn btn-success btn-lg">
                <i class="fas fa-save"></i> Enregistrer
            </button>
        </div>
    </form>
</div>
@endsection