@component('mail::message')
# Bonjour {{ $prenom}}
# Votre code de confirmation est le :  {{ $code}}

cliquez sur le bouton pour reinitialiser mon mot de passe

@component('mail::button', ['url' => 'http://localhost:8000/reinitialisation-mot-de-passe'])
reinitialiser votre mot de passe
@endcomponent


@endcomponent
