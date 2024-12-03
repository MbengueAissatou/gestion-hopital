<?php
namespace App\Http\Controllers;

use App\Models\Personnel;
use Illuminate\Http\Request;

class PersonnelController extends Controller
{
    // Liste du personnel
    public function index()
    {
        $personnels = Personnel::paginate(10);
        return view('personnels.index', compact('personnels'));
    }

    // Formulaire de création
    public function create()
    {
        return view('personnels.create');
    }

    // Sauvegarder un personnel
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'poste' => 'required|string|max:255',
            'telephone' => 'required|string|max:15',
        ]);

        Personnel::create($request->all());

        return redirect()->route('personnels.index')->with('success', 'Personnel ajouté avec succès.');
    }

    // Afficher un personnel
    public function show(Personnel $personnel)
    {
        return view('personnels.show', compact('personnel'));
    }

    // Formulaire de modification
    public function edit(Personnel $personnel)
    {
        return view('personnels.edit', compact('personnel'));
    }

    // Mise à jour des données
    public function update(Request $request, Personnel $personnel)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'poste' => 'required|string|max:255',
            'telephone' => 'required|string|max:15',
        ]);

        $personnel->update($request->all());

        return redirect()->route('personnels.index')->with('success', 'Personnel mis à jour avec succès.');
    }

    // Suppression
    public function destroy(Personnel $personnel)
    {
        $personnel->delete();

        return redirect()->route('personnels.index')->with('success', 'Personnel supprimé avec succès.');
    }
}