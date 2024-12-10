<?php

namespace App\Http\Controllers;

use App\Models\Materiel; // Import du modèle Materiel
use Illuminate\Http\Request;

class MaterielController extends Controller
{
    // Méthode pour afficher la liste des matériels
    public function index()
    {
        $materiels = Materiel::paginate(10); // Pagination pour 10 matériels par page
        return view('materiels.index', compact('materiels'));
    }

    // Méthode pour afficher le formulaire de création
    public function create()
    {
        return view('materiels.create');
    }

    // Méthode pour enregistrer un nouveau matériel
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'reference' => 'nullable|string|max:255',
            'quantite' => 'required|integer|min:1',
            'etat' => 'required|in:neuf,utilisé,en réparation',
            'description' => 'nullable|string',
        ]);

        Materiel::create($validated);

        return redirect()->route('materiels.index')->with('success', 'Matériel ajouté avec succès.');
    }

    // Méthode pour afficher le formulaire de modification
    public function edit(Materiel $materiel)
    {
        return view('materiels.edit', compact('materiel'));
    }

    // Méthode pour mettre à jour un matériel existant
    public function update(Request $request, Materiel $materiel)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'reference' => 'nullable|string|max:255',
            'quantite' => 'required|integer|min:1',
            'etat' => 'required|in:neuf,utilisé,en réparation',
            'description' => 'nullable|string',
        ]);

        $materiel->update($validated);

        return redirect()->route('materiels.index')->with('success', 'Matériel modifié avec succès.');
    }

    // Méthode pour supprimer un matériel
    public function destroy(Materiel $materiel)
    {
        $materiel->delete();
        return redirect()->route('materiels.index')->with('success', 'Matériel supprimé avec succès.');
    }
}