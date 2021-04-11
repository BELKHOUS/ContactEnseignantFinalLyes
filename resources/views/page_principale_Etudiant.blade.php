@extends('base')
@section('title')
Identification
@endsection
@section('assets')
    <link rel="stylesheet" href="/css/style.css">
@endsection
@section('content')

<div class="big-box">

    <div class="min-box">

        <a href="{{route('LogineEtudiant.show')}}">
            <button type="submit" class="Conecter">SE CONECTER</button>
        </a>

        <a href="{{route('InscriptionEtudiant.show')}}">
            <button type="submit" class="Inscrire">S'INSCRIRE</button>
        </a>

    </div>
</div>

@endsection
