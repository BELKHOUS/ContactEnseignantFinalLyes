@extends('base')
@section('title')
Inscription Etudiant
@endsection
@section('assets')
<link rel="stylesheet" href="/css/style.css">
@endsection
@section('content')



<div class="big-box2">

<form class="Inscription-box" action="{{route('Inscription.store')}}" method="POST">
@csrf

@if ($errors->any())
<div class="alert alert-warning ">
    L'étudiant n'a pas pu être ajouté &#9785;
</div>
@endif
{{-- ------------------------------------------------------- --}}



<h2> Inscrivez-vous avec votre adresse e-mail</h2>

<input type="text" name="nom" placeholder="Nom" class="last-name1">
@error('nom')
{{ $message }}
@enderror
{{-- ------------------------------------------------------- --}}
<input type="text" name="prénom" placeholder="Prénom" class="first-name1">
@error('prénom')
{{ $message }}
@enderror
{{-- ------------------------------------------------------- --}}
<input type="email" name="email" placeholder="Email" class="email1">
@error('email')
{{ $message }}
@enderror
{{-- ------------------------------------------------------- --}}
<input type="tel" name="tel" placeholder="Téléphone" class="tel">
@error('tel')
{{ $message }}
@enderror
{{-- ------------------------------------------------------- --}}
<input type="password" name="password" placeholder="Mot de passe" class="password1">
@error('password')
{{ $message }}
@enderror
{{-- ------------------------------------------------------- --}}
<input type="password" name="passwordconfirmation" placeholder="Confirmation Mot de passe" class="password1">
@error('passwordconfirmation')
{{ $message }}
@enderror
{{-- ------------------------------------------------------- --}}
<br>
<select name="niveau" id="niveau">
<option >Niveau d'étude</option>

<option value="Premiere année">Premiere année</option>
<option value="Deuxième année">Deuxième année</option>
<option value="Troisième année">Troisième année</option>
</select>
@error('niveau')
{{ $message }}
@enderror
{{-- ------------------------------------------------------- --}}
<br><br>
<div class="form-group">
<span id="date_de_naissance">Date de naissance</span>
<input type="date" class="last-name1" id="date" name="date">

<!--</select>-->
</div>
@error('date')
{{ $message }}
@enderror
{{-- ------------------------------------------------------- --}}
<div>
<input type="checkbox" id="scales" name="scales" class="@error('scales') is-invalid @enderror" required>
<label for="scales">J'ai lu et j'accepte les Conditions Générales d'Utilisation</label>
</div>
@error('scales')
        {{ $message }}
@enderror


<br>
<input type="submit" name="" value="S'INSCRIRE" class="signup">


<div class="connexion-index">Vous avez déjà un compte ?
<a href="{{route('LogineEtudiant.show')}}">Connectez-vous</a></div>



</form>


</div>


@endsection
