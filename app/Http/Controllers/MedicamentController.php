<?php

namespace App\Http\Controllers;

use App\Models\Medicament;
use Illuminate\Http\Request;

class MedicamentController extends Controller
{
    // Méthode pour afficher la liste des médicaments
    public function index()
    {
        // Récupérer tous les médicaments avec pagination
        $medicaments = Medicament::paginate(10);

        // Retourner la vue 'index' avec la liste des médicaments
        return view('medicaments.index', compact('medicaments'));
    }

    // Méthode pour afficher le formulaire de création
    public function create()
    {
        // Retourner la vue 'create' pour afficher le formulaire de création
        return view('medicaments.create');
    }

    // Méthode pour enregistrer un nouveau médicament
    public function store(Request $request)
    {
        // Validation des données envoyées
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'quantite' => 'required|integer',
            'prix' => 'required|numeric',
        ]);

        // Créer un nouveau médicament
        Medicament::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'quantite' => $request->quantite,
            'prix' => $request->prix,
        ]);

        // Rediriger avec un message de succès
        return redirect()->route('medicaments.index')->with('success', 'Médicament ajouté avec succès.');
    }

    // Méthode pour afficher un médicament spécifique
    public function show($id)
    {
        // Trouver le médicament par son ID
        $medicament = Medicament::findOrFail($id);

        // Retourner la vue 'show' avec les données du médicament
        return view('medicaments.show', compact('medicament'));
    }

    // Méthode pour afficher le formulaire d'édition
    public function edit($id)
    {
        // Trouver le médicament par son ID
        $medicament = Medicament::findOrFail($id);

        // Retourner la vue 'edit' avec les données du médicament
        return view('medicaments.edit', compact('medicament'));
    }

    // Méthode pour mettre à jour les informations du médicament
    public function update(Request $request, $id)
    {
        // Validation des données envoyées
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'quantite' => 'required|integer',
            'prix' => 'required|numeric',
        ]);

        // Trouver le médicament par son ID
        $medicament = Medicament::findOrFail($id);

        // Mettre à jour les informations du médicament
        $medicament->update([
            'nom' => $request->nom,
            'description' => $request->description,
            'quantite' => $request->quantite,
            'prix' => $request->prix,
        ]);

        // Rediriger avec un message de succès
        return redirect()->route('medicaments.index')->with('success', 'Médicament mis à jour avec succès.');
    }

    // Méthode pour supprimer un médicament
    public function destroy($id)
    {
        // Trouver le médicament par son ID
        $medicament = Medicament::findOrFail($id);

        // Supprimer le médicament
        $medicament->delete();

        // Rediriger avec un message de succès
        return redirect()->route('medicaments.index')->with('success', 'Médicament supprimé avec succès.');
    }
}