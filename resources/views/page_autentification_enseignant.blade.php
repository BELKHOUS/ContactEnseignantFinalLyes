@extends('base')
@section('title')
Authentification
@endsection
@section('assets')
    <link rel="stylesheet" href="/css/style.css">
@endsection
@section('content')

<div class="big-box">
    <form class="Conexion-box" class="Conexion-box" method="POST" action="{{route('LoginEnseignant.store')}}">
       @csrf
        <h2> Service d'authentification pour enseignants</h2>
        <br><br>
        @if ($errors->any())
        <div class="alert alert-warning">
          Vous n'avez pas pu être authentifié &#9785;
        </div>
    @endif
        <input type="email" name="email_teacher" aria-describedby="email_feedback" placeholder="E-mail" class="email1 @error('email_teacher') is-invalid @enderror">
        @error('email_teacher')
      <div id="email_feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
        <input type="password" name="password_teacher" aria-describedby="password_feedback" placeholder="Mot de passe" class="password1 @error('password_teacher') is-invalid @enderror">
        @error('password_teacher')
      <div id="password_feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
        <br>
        <!--<label class="checkbox_c"> <input type="checkbox"> Restez connecté</label><br>-->
        <br>
        <button type="submit" class="btn btn-secondary">Se connecter</button>

    </form>
</div>

@endsection
