@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des Cours</h1>
        <a href="{{ route('cours.create') }}" class="btn btn-primary mb-3">Ajouter un Cours</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Libellé</th>
                    <th>Professeur</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cours as $coursItem)
                    <tr>
                        <td>{{ $coursItem->libelle }}</td>
                        <td>{{ $coursItem->prof->nom }} {{ $coursItem->prof->prenom }}</td>
                        <td>
                            <a href="{{ route('cours.edit', $coursItem->id) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('cours.destroy', $coursItem->id) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
