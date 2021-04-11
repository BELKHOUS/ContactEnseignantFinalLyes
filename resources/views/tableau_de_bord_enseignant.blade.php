
@extends('base')
@section('title')
Tableau de bord enseignant
@endsection
@section('assets')
    <link rel="stylesheet" href="/css/style.css">
@endsection

@section('content')

<div class="big-box">
    <div class="Tableau-box">
        <br><br>
        <h2>  Tableau de bord enseignant</h2>
        <br><br>
        <br><br>

        <a href="{{route('disponibilites.show')}}">
                <button type="submit" class="Profil">Disponibilité</button>
        </a>

        <a href="{{route('rendezVousMessage')}}">
                <button type="submit" class="rendez-vous">Mes rendez-vous</button>
        </a>



    </div>
</div>


@endsection
