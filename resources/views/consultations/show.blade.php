@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Détails de la Consultation</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Consultation n°{{ $consultation->id }}</h5>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>Patient</th>
                            <td>{{ $consultation->patient->nom }}</td>
                        </tr>
                        <tr>
                            <th>Médecin</th>
                            <td>{{ $consultation->medecin->nom }}</td>
                        </tr>
                        <tr>
                            <th>Date et Heure</th>
                            <td>{{ $consultation->date_consultation }}</td>
                        </tr>
                        <tr>
                            <th>Diagnostic</th>
                            <td>{{ $consultation->diagnostic }}</td>
                        </tr>
                        <tr>
                            <th>Prescription</th>
                            <td>{{ $consultation->prescription }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <a href="{{ route('consultations.index') }}" class="btn btn-primary">Retour à la liste</a>
        </div>
    </div>
</div>
@endsection