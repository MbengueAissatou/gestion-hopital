@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Tableau de Bord</h2>
    <div class="text-center mb-4">
        <h5>Bienvenue, <strong>{{ Auth::user()->name }}</strong> !</h5>
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-danger">
                <i class="fas fa-sign-out-alt"></i> Se déconnecter
            </button>
        </form>
    </div>

    <!-- Tableau de bord avec une grille responsive -->
    <div class="row">
        <!-- Card Patients -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body text-center">
                    <h5 class="card-title text-primary">
                        <i class="fas fa-users"></i> Patients
                    </h5>
                    <p class="card-text text-muted">Gérez les informations des patients.</p>
                    <a href="{{ route('patients.index') }}" class="btn btn-outline-primary btn-lg">
                        <i class="fas fa-eye"></i> Voir
                    </a>
                </div>
            </div>
        </div>

        <!-- Card Médecins -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body text-center">
                    <h5 class="card-title text-success">
                        <i class="fas fa-user-md"></i> Médecins
                    </h5>
                    <p class="card-text text-muted">Gérez les informations des médecins.</p>
                    <a href="{{ route('medecins.index') }}" class="btn btn-outline-success btn-lg">
                        <i class="fas fa-eye"></i> Voir
                    </a>
                </div>
            </div>
        </div>

        <!-- Card Personnel -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body text-center">
                    <h5 class="card-title text-warning">
                        <i class="fas fa-briefcase"></i> Personnel
                    </h5>
                    <p class="card-text text-muted">Gérez les informations du personnel.</p>
                    <a href="{{ route('personnels.index') }}" class="btn btn-outline-warning btn-lg">
                        <i class="fas fa-eye"></i> Voir
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Card Médicaments -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body text-center">
                    <h5 class="card-title text-danger">
                        <i class="fas fa-pills"></i> Médicaments
                    </h5>
                    <p class="card-text text-muted">Gérez les informations des médicaments.</p>
                    <a href="{{ route('medicaments.index') }}" class="btn btn-outline-danger btn-lg">
                        <i class="fas fa-eye"></i> Voir
                    </a>
                </div>
            </div>
        </div>

        <!-- Card Matériel -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body text-center">
                    <h5 class="card-title text-info">
                        <i class="fas fa-cogs"></i> Matériel
                    </h5>
                    <p class="card-text text-muted">Gérez les matériels de l'hôpital.</p>
                    <a href="{{ route('materiels.index') }}" class="btn btn-outline-info btn-lg">
                        <i class="fas fa-eye"></i> Voir
                    </a>
                </div>
            </div>
        </div>

        <!-- Card Consultations -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body text-center">
                    <h5 class="card-title text-primary">
                        <i class="fas fa-stethoscope"></i> Consultations
                    </h5>
                    <p class="card-text text-muted">Gérez les consultations des patients.</p>
                    <a href="{{ route('consultations.index') }}" class="btn btn-outline-primary btn-lg">
                        <i class="fas fa-eye"></i> Voir
                    </a>
                </div>
            </div>
        </div>

        <!-- Card Rendez-vous -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body text-center">
                    <h5 class="card-title text-secondary">
                        <i class="fas fa-calendar-alt"></i> Rendez-vous
                    </h5>
                    <p class="card-text text-muted">Gérez les rendez-vous.</p>
                    <a href="{{ route('rendezvous.index') }}" class="btn btn-outline-secondary btn-lg">
                        <i class="fas fa-eye"></i> Voir
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection