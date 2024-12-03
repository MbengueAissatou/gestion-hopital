@extends('layouts.app')

@section('content')
<div class="container text-center mt-5">
    <h1>Bienvenue dans l'application de gestion d'hôpital</h1>
    <p class="mt-3">Veuillez vous connecter ou créer un compte pour accéder à l'application.</p>
    <div class="mt-4">
        <a href="{{ route('login.form') }}" class="btn btn-primary btn-lg me-3">
            <i class="fas fa-sign-in-alt"></i> Se connecter
        </a>
        <a href="{{ route('register.form') }}" class="btn btn-secondary btn-lg">
            <i class="fas fa-user-plus"></i> S'inscrire
        </a>
    </div>
</div>
@endsection