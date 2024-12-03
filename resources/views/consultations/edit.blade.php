@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center text-primary">Modifier la Consultation</h1>

    <form action="{{ route('consultations.update', $consultation) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card p-4 shadow-sm">
            <div class="mb-3">
                <label for="patient_id" class="form-label">Patient</label>
                <select name="patient_id" id="patient_id" class="form-control custom-select" required>
                    @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}" @if ($consultation->patient_id == $patient->id) selected @endif>
                        {{ $patient->nom }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="medecin_id" class="form-label">Médecin</label>
                <select name="medecin_id" id="medecin_id" class="form-control custom-select" required>
                    @foreach ($medecins as $medecin)
                    <option value="{{ $medecin->id }}" @if ($consultation->medecin_id == $medecin->id) selected @endif>
                        {{ $medecin->nom }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="date_consultation" class="form-label">Date et Heure</label>
                <input type="datetime-local" name="date_consultation" id="date_consultation" class="form-control"
                    value="{{ $consultation->date_consultation->format('Y-m-d\TH:i') }}" required>
            </div>

            <div class="mb-3">
                <label for="diagnostic" class="form-label">Diagnostic</label>
                <textarea name="diagnostic" id="diagnostic" class="form-control" rows="4"
                    required>{{ $consultation->diagnostic }}</textarea>
            </div>

            <div class="mb-3">
                <label for="prescription" class="form-label">Prescription</label>
                <textarea name="prescription" id="prescription" class="form-control" rows="4"
                    required>{{ $consultation->prescription }}</textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success btn-lg">Mettre à jour</button>
            </div>
        </div>
    </form>
</div>
@endsection