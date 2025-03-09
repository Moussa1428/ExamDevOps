@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier le Professeur</h1>
        <a href="{{ route('profs.index') }}" class="btn btn-secondary mb-3">Retour</a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('profs.update', $prof->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ $prof->nom }}" required>
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $prof->prenom }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $prof->email }}" required>
            </div>
            <button type="submit" class="btn btn-success">Mettre à jour</button>
        </form>
    </div>
@endsection
