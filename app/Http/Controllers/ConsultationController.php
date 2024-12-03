<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Medecin;
use App\Models\Patient;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ConsultationController extends Controller
{
    // Afficher la liste des consultations
    public function index()
    {
        $consultations = Consultation::with(['patient', 'medecin'])->paginate(10); // Récupérer les consultations avec les relations patient et médecin
        return view('consultations.index', compact('consultations'));
    }

    // Afficher le formulaire pour créer une nouvelle consultation
    public function create()
    {
        $medecins = Medecin::all();
        $patients = Patient::all();
        return view('consultations.create', compact('medecins', 'patients'));
    }

    // Enregistrer une nouvelle consultation
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'medecin_id' => 'required|exists:medecins,id',
            'date_consultation' => 'required|date',
            'diagnostic' => 'required|string',
            'prescription' => 'required|string',
        ]);

        $consultation = new Consultation();
        $consultation->patient_id = $request->patient_id;
        $consultation->medecin_id = $request->medecin_id;
        $consultation->date_consultation = Carbon::parse($request->date_consultation);
        $consultation->diagnostic = $request->diagnostic;
        $consultation->prescription = $request->prescription;
        $consultation->save();

        return redirect()->route('consultations.index')->with('success', 'Consultation ajoutée avec succès.');
    }

    // Afficher les détails d'une consultation
    public function show($id)
    {
        $consultation = Consultation::with(['patient', 'medecin'])->findOrFail($id);
        return view('consultations.show', compact('consultation'));
    }

    // Afficher le formulaire d'édition d'une consultation
    public function edit($id)
    {
        $consultation = Consultation::findOrFail($id);
        $consultation->date_consultation = Carbon::parse($consultation->date_consultation);
        $medecins = Medecin::all();
        $patients = Patient::all();

        return view('consultations.edit', compact('consultation', 'medecins', 'patients'));
    }

    // Mettre à jour une consultation existante
    public function update(Request $request, $id)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'medecin_id' => 'required|exists:medecins,id',
            'date_consultation' => 'required|date',
            'diagnostic' => 'required|string',
            'prescription' => 'required|string',
        ]);

        $consultation = Consultation::find($id);
        $consultation->patient_id = $request->patient_id;
        $consultation->medecin_id = $request->medecin_id;
        $consultation->date_consultation = Carbon::parse($request->date_consultation);
        $consultation->diagnostic = $request->diagnostic;
        $consultation->prescription = $request->prescription;
        $consultation->save();

        return redirect()->route('consultations.index')->with('success', 'Consultation mise à jour avec succès.');
    }

    // Supprimer une consultation
    public function destroy($id)
    {
        $consultation = Consultation::findOrFail($id);
        $consultation->delete();

        return redirect()->route('consultations.index')->with('success', 'Consultation supprimée avec succès.');
    }
}