
@extends('base')
@section('title')
Disponibilité
@endsection
@section('assets')
    <link rel="stylesheet" href="/css/style.css">

@endsection

@section('content')



<form method="POST" action="{{route('diponibilites.post')}}">

@csrf
    <div class="container" >
    @if(session()->has('message'))
        <div id="messageDisp" class="alert alert-success" style="font-size: 15px;">
            {{ session()->get('message') }}
        </div>
    @endif
        <h2> disponibilité</h2>
        <div class="bar_iden">
            <ul>
                <li>

                    <img class="photo_profil3" src="/icon/profil1.jpeg" alt="">
                    <div class="prof">
                        <span class="nom_prof">{{$nomPrenom}}</span>
                        <span class="matière">{{$matiere}}</span>
                    </div>
                </li>
            </ul>
        </div><br>

        <h3> Fixer vos disponibilités</h3><br>
        <h2></h2>
        <br><br>
        <table>
            <thead>
                <tr>
                    <td> LINDI</td>

                    @foreach($tabDispoLundi as $tab)
                    @if($tab['Etat']=='oui')
                    <td><input value="{{$tab['Heure']}}" type="checkbox" id="ten" name="choix[]" checked><label for="ten" class="checkbox2">{{$tab['H']}}</label></td>
                    @else
                    <td><input value="{{$tab['Heure']}}" type="checkbox" id="ten" name="choix[]"><label for="ten" class="checkbox2">{{$tab['H']}}</label></td>
                    @endif
                    @endforeach

                </tr>
            </thead>
            <tbody>
                <tr>
                <td> MARDI </td>
                @foreach($tabDispoMardi as $tab)
                @if($tab['Etat']=='oui')
                    <td><input value="{{$tab['Heure']}}" type="checkbox" id="ten" name="choix[]" checked><label for="ten" class="checkbox2">{{$tab['H']}}</label></td>
                    @else
                    <td><input value="{{$tab['Heure']}}" type="checkbox" id="ten" name="choix[]"><label for="ten" class="checkbox2">{{$tab['H']}}</label></td>
                    @endif
                    @endforeach
                </tr>
                <tr>
                <td> MERCREDI</td>
                @foreach($tabDispoMercredi as $tab)
                @if($tab['Etat']=='oui')
                    <td><input value="{{$tab['Heure']}}" type="checkbox" id="ten" name="choix[]" checked><label for="ten" class="checkbox2">{{$tab['H']}}</label></td>
                    @else
                    <td><input value="{{$tab['Heure']}}" type="checkbox" id="ten" name="choix[]"><label for="ten" class="checkbox2">{{$tab['H']}}</label></td>
                    @endif
                    @endforeach
                </tr>
                <tr>
                <td> JEUDI</td>
                @foreach($tabDispoJeudi as $tab)
                @if($tab['Etat']=='oui')
                    <td><input value="{{$tab['Heure']}}" type="checkbox" id="ten" name="choix[]" checked><label for="ten" class="checkbox2">{{$tab['H']}}</label></td>
                    @else
                    <td><input value="{{$tab['Heure']}}" type="checkbox" id="ten" name="choix[]"><label for="ten" class="checkbox2">{{$tab['H']}}</label></td>
                    @endif
                    @endforeach
                </tr>
                <tr>
                <td> VENDREDI</td>
                @foreach($tabDispoVendredi as $tab)
                @if($tab['Etat']=='oui')
                    <td><input value="{{$tab['Heure']}}" type="checkbox" id="ten" name="choix[]" checked><label for="ten" class="checkbox2">{{$tab['H']}}</label></td>
                    @else
                    <td><input value="{{$tab['Heure']}}" type="checkbox" id="ten" name="choix[]"><label for="ten" class="checkbox2">{{$tab['H']}}</label></td>
                    @endif
                    @endforeach
                </tr>

            </tbody>
        </table>
        <!--<input type="submit" name="" value="Confirmer disponibilité" id="Confirmation_disp">-->
        <button type="submit" id="Confirmation_disp" class="btn btn-dark">confirmez</button>

    </div>

</form>




@endsection
