
@extends('base')
@section('title')
Mes rendez-vous etudiant
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
                <ul>
                    <li>
                        <div class="RDV">
                            <span class="date">{{$Name['Jour']}}  {{$Name['Heure']}}</span>
                            <span class="annuler"><a href="#">Annuler</a></span>
                        </div>
                        <img class="photo_profil3" src="/icon/profil1.jpeg" alt="">
                        <div class="prof">
                            <span class="nom_prof">{{$Name['NomEnseignant']}} {{$Name['PrénomEnseignant']}}</span>
                            <span class="matière">{{$Name['Matière']}}</span>
                        </div>
                    </li>
                </ul>
                @endforeach

            @endif

        </div>
    </div>
    <h2></h2>
    <div class="bar_rech">
        <h3>Equipe d'enseignement</h3><br>
        <form action="{{route('barre.reserch')}}">
        <div class="search_box">
            <input type="text" name="q" placeholder="Trouvez votre professeur?">
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
    <div  class="bar_iden">
        <a href="{{route('messageRecu.show')}}">
        <ul>
            <li>
                <div class="prof">
                    <span class="nom_prof">Message reçus</span>
                    <span class="matière">{{$msg_count}}</span>
                </div>

            </li>
        </ul>
        </a>
    </div>
    <br>
</div>


@endsection
