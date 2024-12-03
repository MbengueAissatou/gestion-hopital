@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Détails du Patient</h1>

    <div class="card shadow-sm p-4">
        <div class="card-body">
            <h2 class="card-title mb-4">
                <i class="fas fa-user"></i> {{ $patient->first_name }} {{ $patient->last_name }}
            </h2>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <strong>Date de naissance :</strong> {{ $patient->date_of_birth }}
                </li>
                <li class="list-group-item">
                    <strong>Genre :</strong> {{ $patient->gender == 'M' ? 'Masculin' : 'Féminin' }}
                </li>
                <li class="list-group-item">
                    <strong>Téléphone :</strong> {{ $patient->phone }}
                </li>
                <li class="list-group-item">
                    <strong>Email :</strong> {{ $patient->email }}
                </li>
                <li class="list-group-item">
                    <strong>Adresse :</strong> {{ $patient->address }}
                </li>
            </ul>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('patients.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Retour
        </a>
    </div>
</div>
@endsection