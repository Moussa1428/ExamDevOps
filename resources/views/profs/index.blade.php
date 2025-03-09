@extends('layouts.app')

@section('content')
    <h1>Liste des Professeurs</h1>
    <a href="{{ route('profs.create') }}" class="btn btn-primary">Ajouter Professeur</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($profs as $prof)
                <tr>
                    <td>{{ $prof->nom }}</td>
                    <td>{{ $prof->prenom }}</td>
                    <td>{{ $prof->email }}</td>
                    <td>
                        <a href="{{ route('profs.edit', $prof->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('profs.destroy', $prof->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

