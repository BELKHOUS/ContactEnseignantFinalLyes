
@extends('base')
@section('title')
Prise rendez-vous
@endsection
@section('assets')
    <link rel="stylesheet" href="/css/style.css">
@endsection

@section('content')

<form method="POST" action="{{route('priseRendezVous.post',['emailprofs'=>$email])}}" enctype="multipart/form-data">
@csrf
    <div class="container22">
    @if ($errors->any())
        <div id="messageDisp" class="alert alert-warning">
            Merci de selectionner au moin un créneau &#9785;
        </div>
        @endif

    @if(session()->has('message'))
        <div id="messageDisp" class="alert alert-success" style="font-size: 15px;">
            {{ session()->get('message') }}
        </div>
    @endif
        <h2> Rendez-vous</h2>
        <div class="bar_iden">
              <!--<ul>
                <li>
                    <img class="photo_profil3" src="/icon/profil1.jpeg" alt="">
                    <div class="prof">
                        <span class="nom_prof">{{$PrénomEnseignant}} {{$NomEnseignant}}</span>
                        <span class="matière">{{$Matière}}</span>
                    </div>
                </li>
            </ul>-->
            <input name="profN" type="hidden" value="{{$NomEnseignant}}">
            <input name="profP" type="hidden" value="{{$PrénomEnseignant}}">
        </div><br>
        <h3> Message</h3>
        <div class="Message2">
            <textarea name="message" placeholder="Message"></textarea>
        </div>
        <div class="cc">
            <ul>
                <li>
                    <label for="objet">Objet</label>
                    <select name="motif" id="objet">
                    <option value="aucun">aucun</option>
                    <option value="Reclamation de note">Reclamation de note</option>
                    <option value="Absence">Absence</option>
                    <option value="Retard">Retard</option>
                    <option value="Explication">Explication</option>
                    <option value="Autre">Autre</option>
                </select>
                </li>
                <li>

                    <input name="fichier" type="file">

                </li>
            </ul>
        </div>

        <h2></h2>
        <h3> Rendez-vous</h3>

        <table>
            <thead>
                <tr>
                    <td>Lundi</td>
                    @foreach($tabDispoLundi as $tab)
                    @if($tab['Etat']=='oui')
                    <td><input value="{{$tab['Heure']}}" type="radio" id="ten"    name="choix[]">        <label for="ten" class="radio2">{{$tab['H']}}</label></td>
                    @else
                    <td>--</td>
                    @endif
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> MARDI</td>
                    @foreach($tabDispoMardi as $tab)
                    @if($tab['Etat']=='oui')
                    <td><input value="{{$tab['Heure']}}" type="radio" id="ten"    name="choix[]">        <label for="ten" class="radio2">{{$tab['H']}}</label></td>
                    @else
                    <td>--</td>
                    @endif
                    @endforeach
                </tr>
                <tr>
                    <td> MERCREDI</td>
                    @foreach($tabDispoMercredi as $tab)
                    @if($tab['Etat']=='oui')
                    <td><input value="{{$tab['Heure']}}" type="radio" id="ten"    name="choix[]">        <label for="ten" class="radio2">{{$tab['H']}}</label></td>
                    @else
                    <td>--</td>
                    @endif
                    @endforeach
                </tr>
                <tr>
                    <td> JEUDI</td>
                    @foreach($tabDispoJeudi as $tab)
                    @if($tab['Etat']=='oui')
                    <td><input value="{{$tab['Heure']}}" type="radio" id="ten"    name="choix[]">        <label for="ten" class="radio2">{{$tab['H']}}</label></td>
                    @else
                    <td>--</td>
                    @endif
                    @endforeach
                </tr>
                <tr>
                    <td> VENDREDI</td>
                    @foreach($tabDispoVendredi as $tab)
                    @if($tab['Etat']=='oui')
                    <td><input value="{{$tab['Heure']}}" type="radio" id="ten"    name="choix[]">        <label for="ten" class="radio2">{{$tab['H']}}</label></td>
                    @else
                    <td>--</td>
                    @endif
                    @endforeach
                </tr>




            </tbody>
        </table>
        <button type="submit" class="Confirmation_disp">Soumettre</button>

    </div>

</form>




@endsection
