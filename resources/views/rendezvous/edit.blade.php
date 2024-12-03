@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Modifier un Rendez-vous</h1>

    <form action="{{ route('rendezvous.update', $rendezvous) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="patient_id">Patient</label>
            <select name="patient_id" id="patient_id" class="form-control">
                @foreach($patients as $patient)
                <option value="{{ $patient->id }}" {{ $patient->id == $rendezvous->patient_id ? 'selected' : '' }}>
                    {{ $patient->nom }}
                </option>
                @endforeach
            </select>
            @endsection