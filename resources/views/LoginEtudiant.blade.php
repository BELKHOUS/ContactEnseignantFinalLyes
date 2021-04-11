@extends('base')
@section('title')
Authentification
@endsection
@section('assets')
    <link rel="stylesheet" href="/css/style.css">
@endsection
@section('content')

<div class="big-box">
    <form class="Conexion-box" method="POST" action="{{route('LoginEtudiant.post')}}">
    @csrf


        <h2> Service d'authentification pour étudiants</h2>

        <br><br>
        @if ($errors->any())
        <div class="alert alert-warning">
          Vous n'avez pas pu être authentifié &#9785;
        </div>
    @endif
        <input type="email" name="email" aria-describedby="email_feedback" placeholder="E-mail" class="email1 @error('email') is-invalid @enderror">
        @error('email')
      <div id="email_feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
        <input type="password" name="password" aria-describedby="password_feedback" placeholder="Mot de passe" class="password1 @error('password') is-invalid @enderror">
        @error('password')
      <div id="password_feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
        <br>
        <label class="mot_passe_oubli"> <a href="{{route('motDePasseOublie')}}">Mot de passe oublié ? </a></label><br>
        <label class="checkbox_c"> <input type="checkbox"> Restez connecté</label><br>
        <br>
        <button type="submit" class="btn btn-secondary">Se connecter</button>
        <br>
        <br>
        <div class="connexion-index">Vous n'avez pas encore de compte ?
        <a href="{{route('InscriptionEtudiant.show')}}">Inscrivez-vous</a></div>

    </form>

</div>

@endsection
