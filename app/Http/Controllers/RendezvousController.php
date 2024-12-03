<?php
namespace App\Http\Controllers;

use App\Models\RendezVous;
use App\Models\Patient;
use App\Models\Medecin;
use Illuminate\Http\Request;

class RendezvousController extends Controller
{
    // Afficher la liste des rendez-vous
 public function index()
{
    $rendezvous = RendezVous::paginate(10); // Remplacez '10' par le nombre d'éléments par page souhaité
    return view('rendezvous.index', compact('rendezvous'));
}


    // Formulaire pour créer un nouveau rendez-vous
    public function create()
    {
        $patients = Patient::all();
        $medecins = Medecin::all();
        return view('rendezvous.create', compact('patients', 'medecins'));
    }

    // Sauvegarder un rendez-vous
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'medecin_id' => 'required|exists:medecins,id',
            'date_heure' => 'required|date',
            'status' => 'required|string|max:255',
            'remarques' => 'nullable|string',
        ]);

        RendezVous::create($request->all());

        return redirect()->route('rendezvous.index')->with('success', 'Rendez-vous ajouté avec succès !');
    }

    // Formulaire de modification d'un rendez-vous
    public function edit($id)
    {
        $rendezvous = RendezVous::findOrFail($id);
        $patients = Patient::all();
        $medecins = Medecin::all();
        return view('rendezvous.edit', compact('rendezvous', 'patients', 'medecins'));
    }

    // Mettre à jour un rendez-vous
    public function update(Request $request, $id)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'medecin_id' => 'required|exists:medecins,id',
            'date_heure' => 'required|date',
            'status' => 'required|string|max:255',
            'remarques' => 'nullable|string',
        ]);

        $rendezvous = RendezVous::findOrFail($id);
        $rendezvous->update($request->all());

        return redirect()->route('rendezvous.index')->with('success', 'Rendez-vous mis à jour avec succès !');
    }

    // Supprimer un rendez-vous
    public function destroy($id)
    {
        $rendezvous = RendezVous::findOrFail($id);
        $rendezvous->delete();

        return redirect()->route('rendezvous.index')->with('success', 'Rendez-vous supprimé avec succès !');
    }

    // Afficher les détails d'un rendez-vous
    public function show($id)
    {
        $rendezvous = RendezVous::with(['patient', 'medecin'])->findOrFail($id);
        return view('rendezvous.show', compact('rendezvous'));
    }
}