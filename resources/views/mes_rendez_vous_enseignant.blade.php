
@extends('base')
@section('title')
Mes rendez-vous enseignant
@endsection
@section('assets')
    <link rel="stylesheet" href="/css/style.css">
@endsection

@section('content')
<div class="big-box2">
    <h2> Rendez-vous</h2>
    <h3>Mes rendez-vous</h3><br>


    <div class="bar_iden">
        <div>
            @if ($CC!=0)
            @foreach ($Names as $Name)
            <a href="{{route('RDV-enseignant-etudiant',['Name'=>$Name])}}">

            <ul>
                <li>
                    <div class="RDV">
                        <span class="date">{{$Name['Jour']}}  {{$Name['Heure']}}</span>
                        <span class="annuler"></span>
                    </div>
                    <img class="photo_profil3" src="/icon/profil1.jpeg" alt="">
                    <div class="prof">
                        <span class="nom_prof">{{$Name['NomEtudiant']}} {{$Name['PrénomEtudiant']}}</span>
                        <span class="matière">{{$Name['Niveau_Etude']}}</span>
                    </div>
                </li>

            </ul>
        </a>
            @endforeach
            @endif


        </div>
    </div>
    <h2></h2>
    <div class="bar_rech">
        <h3>Etudiant</h3><br>
        <form action="{{route('barre2.reserch')}}">
            <div class="search_box">
                <input type="text" name="q" placeholder="Trouvez l'étudiant?">
                <button type="submit" class="btn btn-info">Chercher</button>
            </div>
            </form>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
    <h2></h2>



    <br>


</div>
@endsection
