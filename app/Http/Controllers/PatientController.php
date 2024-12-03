<?php
namespace App\Http\Controllers; 
use App\Models\Patient; 
use Illuminate\Http\Request; 
class PatientController extends Controller 
   
    {
   
         // Afficher tous les patients
    public function index()
    {
        $patients = Patient::paginate(10);
        return view('patients.index', compact('patients'));
    }

    // Formulaire pour ajouter un nouveau patient
    public function create()
    {
        return view('patients.create');
    }

    // Enregistrer un nouveau patient
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email|unique:patients',
            'address' => 'required|string',
        ]);

        $patient = Patient::create($request->all());

        return redirect('/patients')->with('success', 'Patient ajouté avec succès!');
    }

    // Afficher un patient
    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.show', compact('patient'));
    }

    // Formulaire pour éditer un patient
    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.edit', compact('patient'));
    }

    // Mettre à jour un patient
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
        ]);

        $patient = Patient::findOrFail($id);
        $patient->update($request->all());

        return redirect('/patients')->with('success', 'Patient mis à jour avec succès!');
    }

    // Supprimer un patient
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect('/patients')->with('success', 'Patient supprimé avec succès!');
    }
    }