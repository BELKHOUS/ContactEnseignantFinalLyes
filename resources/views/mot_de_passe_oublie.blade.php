@extends('base')
@section('title')
Mot de passe oublié
@endsection
@section('assets')
    <link rel="stylesheet" href="/css/style.css">
@endsection
@section('content')
<div class="big-box" style="font-size: 30px;">
    <form class="demande-box" action="{{route('motDePasseOublie.post')}}" method="POST">
    @csrf
    @if(session()->has('message'))
        <div class="alert alert-success" style="font-size: 20px;">
            {{ session()->get('message') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger" style="font-size: 20px;">
        La réinitialisation de votre mot de passe a échoué &#9785;
        </div>
    @endif

        <br><br>
        <h2> Vous avez oublié votre mot de passe ? <br> Le changement, ça a du bon !</h2>
        <br><br>
        <br><br>

        <h4>Entrez votre adresse e-mail ci-dessous et nous vous enverrons la marche à suivre. <br> Si vous ne voyez pas notre e-mail, regardez dans votre dossier Spam.</h4><br>
        <br><br>
        <br><br>
        <input type="email" name="email" placeholder="Email" class="email1">
        <div class="alert-danger"> {{ $errors->first('email')}} </div>

        <br><br>
        
        <input type="submit" name="" value="Envoyer ma demande" id="Enregistrer">

    </form>


</div>

@endsection
