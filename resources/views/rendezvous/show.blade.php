@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Détails du Rendez-vous</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Rendez-vous n°{{ $rendezvous->id }}</h5>

            <p><strong>Patient :</strong> {{ $rendezvous->patient->nom }}</p>
            <p><strong>Médecin :</strong> {{ $rendezvous->medecin->nom }}</p>
            <p><strong>Date et Heure :</strong> {{ $rendezvous->date_heure }}</p>
            <p><strong>Motif :</strong> {{ $rendezvous->motif }}</p>

            <a href="{{ route('rendezvous.index') }}" class="btn btn-primary">Retour à la liste</a>
            <a href="{{ route('rendezvous.edit', $rendezvous) }}" class="btn btn-warning">Modifier</a>
            <form action="{{ route('rendezvous.destroy', $rendezvous) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce rendez-vous ?')">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection