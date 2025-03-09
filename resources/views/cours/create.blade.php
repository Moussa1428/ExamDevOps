@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ajouter un Cours</h1>
        <a href="{{ route('cours.index') }}" class="btn btn-secondary mb-3">Retour</a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('cours.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="libelle" class="form-label">Libellé du cours</label>
                <input type="text" class="form-control" id="libelle" name="libelle" required>
            </div>
            <div class="mb-3">
                <label for="prof_id" class="form-label">Professeur</label>
                <select class="form-control" id="prof_id" name="prof_id" required>
                    <option value="">Sélectionnez un professeur</option>
                    @foreach ($profs as $prof)
                        <option value="{{ $prof->id }}">{{ $prof->nom }} {{ $prof->prenom }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
@endsection
