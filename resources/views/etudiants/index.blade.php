@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des étudiants</h2>
    <a href="{{ route('etudiants.create') }}" class="btn btn-primary">Ajouter un étudiant</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Cours</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($etudiants as $etudiant)
            <tr>
                <td>{{ $etudiant->nom }}</td>
                <td>{{ $etudiant->prenom }}</td>
                <td>{{ $etudiant->cours->libelle }}</td>
                <td>
                    <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn btn-warning">Modifier</a>
                    <form action="{{ route('etudiants.destroy', $etudiant->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
