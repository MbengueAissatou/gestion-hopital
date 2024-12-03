@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Ajouter un Médecin</h1>

    <!-- Affichage des erreurs de validation -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('medecins.store') }}" method="POST">
        @csrf
        <!-- Tableau stylisé pour saisir les informations -->
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Champ</th>
                    <th>Valeur</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><label for="nom" class="form-label">Nom</label></td>
                    <td><input type="text" name="nom" id="nom" class="form-control" required value="{{ old('nom') }}">
                    </td>
                </tr>

                <tr>
                    <td><label for="specialite" class="form-label">Spécialité</label></td>
                    <td><input type="text" name="specialite" id="specialite" class="form-control" required
                            value="{{ old('specialite') }}"></td>
                </tr>

                <tr>
                    <td><label for="telephone" class="form-label">Téléphone</label></td>
                    <td><input type="text" name="telephone" id="telephone" class="form-control" required
                            value="{{ old('telephone') }}"></td>
                </tr>

                <tr>
                    <td><label for="email" class="form-label">Email</label></td>
                    <td><input type="email" name="email" id="email" class="form-control" required
                            value="{{ old('email') }}"></td>
                </tr>

                <tr>
                    <td><label for="adresse" class="form-label">Adresse</label></td>
                    <td><textarea name="adresse" id="adresse" class="form-control" rows="4"
                            required>{{ old('adresse') }}</textarea></td>
                </tr>
            </tbody>
        </table>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Enregistrer</button>
        </div>
    </form>
</div>
@endsection