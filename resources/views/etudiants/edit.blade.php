@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier l'étudiant</h2>
    <form action="{{ route('etudiants.update', $etudiant->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ $etudiant->nom }}" required>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" class="form-control" value="{{ $etudiant->prenom }}" required>
        </div>
        <div class="form-group">
            <label for="idcours">Cours</label>
            <select name="idcours" id="idcours" class="form-control" required>
                @foreach ($cours as $coursItem)
                <option value="{{ $coursItem->id }}" {{ $coursItem->id == $etudiant->idcours ? 'selected' : '' }}>
                    {{ $coursItem->libelle }}
                </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
    </form>
</div>
@endsection
