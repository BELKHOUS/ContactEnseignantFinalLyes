
@extends('base')
@section('title')
Accueil
@endsection
@section('assets')
    <link rel="stylesheet" href="/css/style.css">
@endsection
@section('content')

    <div class="big-box">

        <div class="min-box">

            <a href="{{route('connexionEtudiant.show')}}">
                <button type="submit" class="Etudiant">Etudiant</button>
            </a>

            <a href="{{route('LogineEnseignant.show')}}">
                <button type="submit" class="Enseignant">Enseignant</button>
            </a>

        </div>
    </div>

@endsection

