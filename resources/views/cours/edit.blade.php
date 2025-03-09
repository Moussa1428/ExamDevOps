@extends('layouts.app')

@section('content')
    <h1>Modifier le Cours</h1>

    <form action="{{ route('cours.update', $cours->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="libelle" class="form-label">Libellé</label>
            <input type="text" class="form-control" id="libelle" name="libelle" value="{{ $cours->libelle }}" required>
        </div>

        <div class="mb-3">
            <label for="prof_id" class="form-label">Professeur</label>
            <select class="form-control" id="prof_id" name="prof_id" required>
                @foreach ($profs as $prof)
                    <option value="{{ $prof->id }}" {{ $cours->prof_id == $prof->id ? 'selected' : '' }}>
                        {{ $prof->nom }} {{ $prof->prenom }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
@endsection
