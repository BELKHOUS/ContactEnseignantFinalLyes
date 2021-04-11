
@extends('base')
@section('title')
Réitialisatonde mot de passe
@endsection
@section('assets')
    <link rel="stylesheet" href="/css/style.css">
@endsection

@section('content')

<div class="big-box">

    <form class="box" action="{{route('reinitialisationMotDePasse.post')}}" method="POST">
    @csrf
    @if(session()->has('message'))
        <div class="alert alert-success" style="font-size: 20px;">
            {{ session()->get('message') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger" style="font-size: 20px;">
        echeque de réinitialisation du mot de passe, vérifiez bien vos informations &#9785;
        </div>
    @endif
        <h2> Réinitialisation du mot de passe</h2>
        <br><br><br>
        <input type="email" name="email" placeholder="Mail" class="password1">
        <div class="alert-danger"> {{ $errors->first('email')}} </div>
        <input type="number" name="code" placeholder="Code de confirmation" class="password1">
        <div class="alert-danger"> {{ $errors->first('code')}} </div>
        <input type="password" name="password1" placeholder="Nouveau mot de passe" class="password1">
        <div class="alert-danger"> {{ $errors->first('password1')}} </div>
        <input type="password" name="password2" placeholder="Confirmer le mot de passe" class="password1">
        <div class="alert-danger"> {{ $errors->first('password2')}} </div>
        <br>
        <br><br>
        <input type="submit" name="" value="Reinitialiser" class="login">
        <br><br>

        <div class="connexion-index"><a href="{{route('LogineEtudiant.show')}}">Revenir à la page d'authentification</a></div>
    </form>


</div>

@endsection
