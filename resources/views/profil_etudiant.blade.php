
@extends('base')
@section('title')
Profil etudiant
@endsection
@section('assets')
    <link rel="stylesheet" href="/css/style.css">
@endsection

@section('content')


<div class="big-box">
@if(session()->has('message'))
        <div class="alert alert-success" style="font-size: 20px;">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="profil-box">
        <h2> Profil</h2>
        <br><br>
        <br><br>
        <section>
        
        <a href="{{route('modificationEtudiant')}}">
                <button type="submit" class="Modifier">Modifier mes informations</button>
        </a>
        </section>


        <section>
            <h3>A propos de moi</h3><br>
            <img class="photo_profil" src="http://localhost:8000/storage/image/{{$tab['NomImage']}}" alt="">
            <br>
            <div class="Non_etudiant">{{$tab['nom']."  ". $tab['prenom']}}</div>
            <div class="date_naissance">Date de naissance : {{$tab['dateNaissance']}}</div>
            <div class="Tel">Tel : {{$tab['phone']}}</div>
            <div class="class">Classe: {{$tab['classe']}}</div>


            <br><br><br><br>
        </section>
        <section>
            <h3>compte</h3>
            <br>
            <div class="date_inscription">Date d'inscription : 01/11/2017</div>
            <div class="date_connexion">Derniere connexion : 01/11/2020</div>
        </section>
    </div>

</div>

@endsection
