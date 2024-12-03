@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Ajouter un Patient</h1>

    <form action="{{ route('patients.store') }}" method="POST" class="shadow p-4 rounded bg-light">
        @csrf
        <div class="mb-3">
            <label for="first_name" class="form-label">Prénom</label>
            <input type="text" class="form-control form-control-lg" id="first_name" name="first_name"
                placeholder="Entrez le prénom du patient" required pattern="[A-Za-zÀ-ÿ\s]+"
                title="Le prénom ne doit contenir que des lettres.">
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Nom</label>
            <input type="text" class="form-control form-control-lg" id="last_name" name="last_name"
                placeholder="Entrez le nom de famille" required pattern="[A-Za-zÀ-ÿ\s]+"
                title="Le nom ne doit contenir que des lettres.">
        </div>
        <div class="mb-3">
            <label for="date_of_birth" class="form-label">Date de naissance</label>
            <input type="date" class="form-control form-control-lg" id="date_of_birth" name="date_of_birth" required>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Genre</label>
            <select class="form-control form-control-lg" id="gender" name="gender" required>
                <option value="">Choisissez le genre</option>
                <option value="M">Masculin</option>
                <option value="F">Féminin</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Téléphone</label>
            <input type="text" class="form-control form-control-lg" id="phone" name="phone"
                placeholder="Ex : +221 77 123 45 67" required pattern="\+?\d{8,15}"
                title="Entrez un numéro de téléphone valide (8 à 15 chiffres).">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control form-control-lg" id="email" name="email"
                placeholder="Ex : patient@email.com" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Adresse</label>
            <textarea class="form-control form-control-lg" id="address" name="address"
                placeholder="Entrez l'adresse du patient" required rows="3"></textarea>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary btn-lg">
                <i class="fas fa-save"></i> Enregistrer
            </button>
        </div>
    </form>
</div>
@endsection