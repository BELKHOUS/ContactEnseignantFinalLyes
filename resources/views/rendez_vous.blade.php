
@extends('base')
@section('title')
RDV
@endsection
@section('assets')
    <link rel="stylesheet" href="/css/style.css">
@endsection
@section('content')
<div class="big-box">
    <h2> Rendez-vous</h2>


    <div class="bar_iden">
        <div>
            <ul>
                <li>
                    <img class="photo_profil3" src="/icon/profil1.jpeg" alt="">
                    <div class="prof">
                        <span class="nom_prof">{{$etudiant['PrénomEtudiant']}} {{$etudiant['NomEtudiant']}}</span>
                        <span class="matière">{{$etudiant['Niveau_Etude']}}</span>
                    </div>
                </li>
                <li>
                    <div class="prof">
                        <span class="nom_prof">Objet</span>
                        <span class="matière">{{$obj[0]['objet']}}</span>
                    </div>
                </li>
                @if ($nomFichierHache!=null)
                <li>
                    <a href="http://localhost:8000/storage/image/fichiers/{{$nomFichierHache}}">
                    <div class="prof">
                        <span class="nom_prof">Documents</span>
                        <span class="matière">1</span>
                    </div>
                </a>
                </li>
                @else
                <li>
                    <a href="#">
                    <div class="prof">
                        <span class="nom_prof">Documents</span>
                        <span class="matière">0</span>
                    </div>
                </a>
                </li>
                @endif


            </ul>
        </div>
    </div>
    <form action="">
        <br><br><br><br>
        <h3> Message reçu :</h3><br>

        <div class="Message">
            <p>{{$Msg[0]['Message']}}</p>
        </div>
    </form>





    <br>


</div>

@endsection
