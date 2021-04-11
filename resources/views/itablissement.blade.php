
@extends('base')
@section('assets')
    <link rel="stylesheet" href="/css/styles.css">
@endsection
@section('title')
Itablissement
@endsection


@section('content')

<div class="big-box container-fluid">
    <div class="row">
        <div class="col-lg-8 col-md-12 eta">
           <h1>à propos de notre école</h1>
           <hr>
           <p>
            L'école est située sur deux sites à Hove : Le campus de Valley accueille des élèves âgés de 11 à 13 ans et de 17 à 19 ans (7e, 8e et 6e années), tandis que le campus de Nevill accueille des élèves âgés de 14 à 19 ans (9e, 10e et 11e années), ce qui a récemment permis d'augmenter l'espace consacré à la 6e année . L'école propose des GCSE, des NVQ et des A Levels.
            .</p>
            <p>En 2002, l'école a été accréditée en tant que collège de langues spécialisé. Bien que le programme des écoles spécialisées ait pris fin, l'école Hove Park continue à se spécialiser dans les langues et propose des cours en français, allemand, espagnol, italien et mandarin, ainsi que des cours extrascolaires en japonais et en arabe, ainsi que dans certaines langues plus courantes. L'école participe également au programme Interreg IVa, financé par l'Union européenne, qui organise des échanges éducatifs et culturels réguliers avec des élèves d'Europe.

                Traduit avec www.DeepL.com/Translator (version gratuite).</p>
        </div>

        <div class="col-lg-4 col-md-12 eta">
            <h1>heures d'ouverture</h1>
            <hr>
            <p>16 Mar 2020 - 20 Jui 2021</p>
            <p>sessions de printemps</p>
            <a href="{{route('InscriptionEtudiant.show')}}"><button class="btn btn-primary btn1">Je m'inscris</button></a>
        </div>
    </div>

</div>
@endsection
