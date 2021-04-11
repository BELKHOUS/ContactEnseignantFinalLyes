<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--google font for family font-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;900&family=Ubuntu:wght@300;400;700&display=swap" rel="stylesheet">
    <!--script of bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!---CSS style sheet-->
    @yield('assets')
    <link rel="icon" href="/icon/blob.png">
    <!---fonts for the icon from awsome font icon-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!--Js and JQuery syntaxe for the burger button-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script>
         function showDiv2() {
        document.getElementById("messageDisp").style.display = 'none';
    }
    setTimeout("showDiv2()",2000); // aprés 2 secs
    </script>
    <title>@yield('title')</title>
</head>

<body>

    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <button class="navbar-toggler" data-target="#navbarTogglerDemo02" data-toggle="collapse" aria-expanded="false" aria-controls="navbarTogglerDemo02" aria-label="Toggelnavigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbarTogglerDemo02" class="collapse navbar-collapse">
                <a class="navbar-brand" href="{{route('PageAccueil.show')}}">Hove Parck School<span class="logo2">Together we Achieve</span></a>
                <ul class="navbar-nav ml-auto">
                    <li class="navbar-item">
                        <a class="nav-link fix" href="{{route('PageAccueil.show')}}">Accueil</a>
                    </li>
                    <li class="navbar-item">
                        <a class="nav-link fix" href="{{route('itablissement.show')}}">Etablissement</a>
                    </li>
                    <li class="navbar-item">
                        <a class="nav-link fix" href="{{route('contact.show')}}">Contact</a>
                    </li>
                <li class="navbar-item">
                @if (session()->has('student'))
                <form method="POST" action="/logout">
                    @csrf



                    <a class="nav-link" href="{{route('PageAccueil.show')}}"><button type="submit" class="btn btn-outline-primary">Déconnexion</button></button></a>

                    </form>
                </li>
                @endif
                @if (session()->has('teacher'))

                <form method="POST" action="/logout">
                    @csrf


                    <a class="nav-link" href="{{route('PageAccueil.show')}}"><button type="submit" class="btn btn-outline-primary">Déconnexion</button></button></a>


                    </form>
                </li>


                @endif
                </ul>
            </div>
        </nav>
    </div>

    <main>
        @yield('content')
    </main>



</body>

</html>
