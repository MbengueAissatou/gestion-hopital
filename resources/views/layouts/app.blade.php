<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Hôpital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet" />




</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <!-- Logo ajouté -->
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('images/logo-sanitaire.png') }}" alt="Logo Sanitaire" width="50" height="50">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="/tableau_de_bord">Tableau de bord</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/patients">Patients</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/medecins">Médecins</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/personnels">Personnels</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/medicaments">Médicaments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/rendezvous">Rendez-vous</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/consultations">Consultations</a>
                        </li>
                        @endauth
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login.form') }}">Connexion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register.form') }}">Inscription</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <span class="navbar-text me-3">Bonjour, {{ Auth::user()->name }}</span>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link"
                                    style="display: inline; cursor: pointer;">Déconnexion</button>
                            </form>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <main class="py-4">
        @yield('content')
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
@include('masters.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
</script>
</body>

</html>