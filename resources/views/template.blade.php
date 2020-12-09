<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon"/>
    <title>Dashboard</title>
</head>
<body>
                <div class="container-fluid leftHeight">
                        <div class="row">
                                <div class="col-2 leftBar" >
                                <center>
                                <img id="avatar" src='{{ asset('img/avatar.png') }}'>
                                <br/>
                                <span class=" username font-weight-light h3"> {{ $username }} </span>

                                <div class="logout">
                                <small class="text-muted"><a href="/dashboard" class="text-white">Accueil</a>
                                |
                                <a href="/" class="text-white">Mon compte</a>
                                |
                                <a href="/logout" class="text-white">Logout</a></small>
                                     
                                </div>
                                </center>
                                <hr style="background-color:white;margin-bottom:-1px;">
                                        
                                        <div class="category container">Item</div>

                                        <a href="/item"><button type="button" class="container souscategory2" >Visualisation</button></a>
                                        <a href="/item/add"><button type="button" class="container souscategory2" >Création</button></a>
                                        
                                        <div class="category container ">Quest</div>

                                        <a href="/quest"><button type="button" class="container souscategory2">Visualisation</button></a>
                                        <a href="/quest/add"><button type="button" class="container souscategory2">Création</button></a>

                                </div>
                                <div class="col">

                                    <!-- Contenue ici-->
                                    @yield('Contenuedepage') 

                                </div>
                </div>
</body>
</html>
