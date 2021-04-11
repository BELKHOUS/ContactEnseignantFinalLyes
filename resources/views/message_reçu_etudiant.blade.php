@extends('base')
@section('title')
Messages reçus
@endsection
@section('assets')
    <link rel="stylesheet" href="/css/style.css">
@endsection
@section('content')
<div class="big-box">
    <h2> Messages reçus</h2>


    <div class="bar_iden">
        <div>
            @if ($CC!=0)
            @foreach ($Names as $Name)
            <a href="{{route('messageRecu_msg.show',['Id_Enseignant'=>$Name[0]['Id_Enseignant'] ,'Id_msg'=>$Name[0]['Id_msg']])}}" >
            <ul>
                <li>
                    <img class="photo_profil3" src="/icon/profil1.jpeg" alt="">
                    <div class="prof">
                        <span class="nom_prof">{{$Name[0]['NomEnseignant']}} {{$Name[0]['PrénomEnseignant']}}</span>
                        <span class="matière">{{$Name[0]['Matière']}}</span>
                    </div>
                </li>
            </ul>
            </a>
            @endforeach

            @endif

        </div>
    </div>
    <br>


</div>

@endsection
