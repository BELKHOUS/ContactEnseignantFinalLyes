
@extends('base')
@section('title')
Tableau de bord etudiant
@endsection
@section('assets')
    <link rel="stylesheet" href="/css/style.css">
@endsection

@section('content')

<div class="big-box">
    <div class="Tableau-box">
        <br><br>
        <h2> Tableau de bord étudiant</h2>
        <br><br>
        <br><br>

        <a href="{{route('profil.show')}}">
                <button type="submit" class="Profil">Profil</button>
        </a>

        <a href="{{route('MesRendezVousEtudiant')}}">
                <button type="submit" class="rendez-vous">Mes rendez-vous</button>
        </a>



    </div>
</div>

@endsection
