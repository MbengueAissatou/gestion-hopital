@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Modifier le Patient</h1>

    <form action="{{ route('patients.update', $patient->id) }}" method="POST" class="shadow p-4 rounded bg-light">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="first_name" class="form-label">Prénom</label>
            <input type="text" class="form-control form-control-lg" id="first_name" name="first_name"
                value="{{ $patient->first_name }}" required pattern="[A-Za-zÀ-ÿ\s]+"
                title="Le prénom ne doit contenir que des lettres.">
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Nom</label>
            <input type="text" class="form-control form-control-lg" id="last_name" name="last_name"
                value="{{ $patient->last_name }}" required pattern="[A-Za-zÀ-ÿ\s]+"
                title="Le nom ne doit contenir que des lettres.">
        </div>
        <div class="mb-3">
            <label for="date_of_birth" class="form-label">Date de naissance</label>
            <input type="date" class="form-control form-control-lg" id="date_of_birth" name="date_of_birth"
                value="{{ $patient->date_of_birth }}" required>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Genre</label>
            <select class="form-control form-control-lg" id="gender" name="gender" required>
                <option value="M" {{ $patient->gender == 'M' ? 'selected' : '' }}>Masculin</option>
                <option value="F" {{ $patient->gender == 'F' ? 'selected' : '' }}>Féminin</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Téléphone</label>
            <input type="text" class="form-control form-control-lg" id="phone" name="phone"
                value="{{ $patient->phone }}" required pattern="\+?\d{8,15}"
                title="Entrez un numéro de téléphone valide (8 à 15 chiffres).">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control form-control-lg" id="email" name="email"
                value="{{ $patient->email }}" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Adresse</label>
            <textarea class="form-control form-control-lg" id="address" name="address" required
                rows="3">{{ $patient->address }}</textarea>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary btn-lg">
                <i class="fas fa-save"></i> Mettre à jour
            </button>
        </div>
    </form>
</div>
@endsection