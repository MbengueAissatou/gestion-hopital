<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\RendezvousController;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
| Ici, tu peux enregistrer les routes web pour ton application.
|
*/

// Route publique pour la page d'accueil (welcome)
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Routes d'authentification
Route::middleware('guest')->group(function () {
    // Formulaire de connexion
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
    // Connexion
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    // Formulaire d'inscription
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
    // Inscription
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

// Déconnexion (accessible uniquement aux utilisateurs connectés)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Routes protégées par le middleware 'auth'
Route::middleware(['auth'])->group(function () {
    // Tableau de bord
    Route::get('/tableau_de_bord', function () {
        return view('tableau_de_bord');
    })->name('tableau_de_bord');

    // Routes pour gérer les patients
    Route::resource('patients', PatientController::class);

    // Routes pour gérer les médecins
    Route::resource('medecins', MedecinController::class);

    // Routes pour gérer les personnels
    Route::get('/personnels', [PersonnelController::class, 'index'])->name('personnels.index');
    Route::get('/personnels/create', [PersonnelController::class, 'create'])->name('personnels.create');
    Route::post('/personnels', [PersonnelController::class, 'store'])->name('personnels.store');
    Route::get('/personnels/{personnel}', [PersonnelController::class, 'show'])->name('personnels.show');
    Route::get('/personnels/{personnel}/edit', [PersonnelController::class, 'edit'])->name('personnels.edit');
    Route::put('/personnels/{personnel}', [PersonnelController::class, 'update'])->name('personnels.update');
    Route::delete('/personnels/{personnel}', [PersonnelController::class, 'destroy'])->name('personnels.destroy');

    // Routes pour gérer les médicaments
    Route::resource('medicaments', MedicamentController::class);

    // Routes pour gérer les consultations
    Route::resource('consultations', ConsultationController::class);

    // Routes pour gérer les rendez-vous
    Route::resource('rendezvous', RendezvousController::class);
});