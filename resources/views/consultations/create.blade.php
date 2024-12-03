@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Ajouter une Consultation</h1>

    <form action="{{ route('consultations.store') }}" method="POST">
        @csrf

        <!-- Tableau de saisie des informations de la consultation -->
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <td><label for="patient_id" class="form-label">Patient</label></td>
                    <td>
                        <select name="patient_id" id="patient_id" class="form-control" required>
                            <option value="">Sélectionner un patient</option>
                            @foreach ($patients as $patient)
                            <option value="{{ $patient->id }}">{{ $patient-> first_name }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="medecin_id" class="form-label">Médecin</label></td>
                    <td>
                        <select name="medecin_id" id="medecin_id" class="form-control" required>
                            <option value="">Sélectionner un médecin</option>
                            @foreach ($medecins as $medecin)
                            <option value="{{ $medecin->id }}">{{ $medecin->nom }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><label for="date_consultation" class="form-label">Date et Heure</label></td>
                    <td>
                        <input type="datetime-local" name="date_consultation" id="date_consultation"
                            class="form-control" required>
                    </td>
                </tr>

                <tr>
                    <td><label for="diagnostic" class="form-label">Diagnostic</label></td>
                    <td>
                        <textarea name="diagnostic" id="diagnostic" class="form-control" rows="4" required></textarea>
                    </td>
                </tr>

                <tr>
                    <td><label for="prescription" class="form-label">Prescription</label></td>
                    <td>
                        <textarea name="prescription" id="prescription" class="form-control" rows="4"
                            required></textarea>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
</div>
@endsection