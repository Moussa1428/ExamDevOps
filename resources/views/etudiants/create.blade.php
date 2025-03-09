@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ajouter un étudiant</h2>
    <form action="{{ route('etudiants.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="idcours">Cours</label>
            <select name="idcours" id="idcours" class="form-control" required>
                @foreach ($cours as $coursItem)
                <option value="{{ $coursItem->id }}">{{ $coursItem->libelle }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Enregistrer</button>
    </form>
</div>
@endsection
