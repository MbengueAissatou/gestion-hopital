<?php
namespace App\Http\Controllers;

use App\Models\Medecin;
use Illuminate\Http\Request;

class MedecinController extends Controller
{
    // Liste des médecins
    public function index()
    {
        $medecins = Medecin::paginate(10);
        return view('medecins.index', compact('medecins'));
    }

    // Formulaire de création
    public function create()
    {
        return view('medecins.create');
    }

    // Sauvegarder un médecin
  public function store(Request $request)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'specialite' => 'required|string|max:255',
        'telephone' => 'required|string|max:15',
        'email' => 'required|email|unique:medecins,email',
        'adresse' => 'required|string',
    ]);

    // Si la validation passe, enregistrez le médecin
    Medecin::create($request->all());

    return redirect()->route('medecins.index')->with('success', 'Médecin ajouté avec succès!');
}


    // Affichage d'un médecin
    public function show(Medecin $medecin)
    {
        return view('medecins.show', compact('medecin'));
    }

    // Formulaire de modification
    public function edit(Medecin $medecin)
    {
        return view('medecins.edit', compact('medecin'));
    }

    // Mise à jour d'un médecin
    public function update(Request $request, Medecin $medecin)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'specialite' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|unique:medecins,email,' . $medecin->id,
            'adresse' => 'required|string|max:500',
        ]);

        $medecin->update($request->all());

        return redirect()->route('medecins.index')->with('success', 'Médecin mis à jour avec succès.');
    }

    // Suppression d'un médecin
    public function destroy(Medecin $medecin)
    {
        $medecin->delete();

        return redirect()->route('medecins.index')->with('success', 'Médecin supprimé avec succès.');
    }
}