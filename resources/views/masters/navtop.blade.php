  <div>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="container">
              <!-- Logo ajouté -->
              <a class="navbar-brand" href="/">
                  <img src="{{ asset('images/logo-sanitaire.png') }}" alt="Logo Sanitaire" width="50" height="50">
              </a>

              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                  aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
                          <a class="nav-link" href="/materiels">Materiels</a>
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