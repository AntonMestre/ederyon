<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon"/>
    <script src="https://kit.fontawesome.com/85e00a4046.js" crossorigin="anonymous"></script>
    <title>Dashboard</title>
</head>
<body>

  <nav style="" class=" navbar sticky-top navbar-light navEdit navbar-expand">
    <div class="collapse navbar-collapse">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link itemli" href="#">BDD</a>
      </li>
      <li class="nav-item">
        <a class="nav-link username pl-4 pr-4 pt-1 pb-1 shadow-sm" href="#">{{ $username }}</a>
      </li>
    
    </ul>
    </div>
  </nav>

  <div class="container-fluid leftHeight">
    <div class="row">
            <div class="col-2 nopadding">
              <div class="leftBar">

                <div class="text-center">
                  <img width="70%" src="{{ asset('img/test.png') }}" class="" id="topimg">
                </div>

              <div class="version shadow-sm">Version 1.0.0</div>

                <ul class="leftnavi">
                  <li class="itemleftnavi active">
                    <div class="row">
                    <div class="col-sm">
                      <a>Items</a>
                    </div>
                    <div class="col-sm text-right iconnavact">
                      <i class="far fa-plus-square"></i>
                    </div>
                  </div>
                  </li>

                    <li class="itemleftnavi">
                      <div class="row">
                      <div class="col-sm">
                        <a>Quests</a>
                      </div>
                      <div class="col-sm text-right iconnavact">
                        <i class="far fa-plus-square"></i>
                      </div>
                    </div>
                    </li>


                    <li class="itemleftnavi">
                      <div class="row">
                      <div class="col-sm">
                        <a>Portals</a>
                      </div>
                      <div class="col-sm text-right iconnavact">
                        <i class="far fa-plus-square"></i>
                      </div>
                    </div>
                    </li>


                </ul>
            </div>


            </div>
            <div class="col">

              <div style="margin-top:50px;" class="container ">

                <div class="row">

                  <div class="col-sm">
                    <h4 style="color:white;">Items</h4>
                  </div>
                  <div class="col-sm">

                    <div class="d-flex flex-row-reverse bd-highlight">
                      <div class="buttonAjout shadow-sm"><i style="padding-right: 5px" class="fas fa-plus-circle"></i>Ajouter</div>
                      <div class="buttonRegl shadow-sm mr-2"><i style="padding-right: 5px" class="fas fa-cog"></i></i>Filtrer</div>


                    </div>


                    
                  </div>
                

                </div>






              </div>

        <div class="container">
        <div class="visuItemCont">
        <div data-spy="scroll" data-target="#navbar-example2" data-offset="0" style="position:relative;height:500px;overflow-y:scroll;">
          <div class="container">
            <div class="row">
              <div class="card-columns" >
              @foreach ($items as $item)
              <div id="C{{ $item->IT_ID }}" class="card insideItems carte">
                <div class="card-body">
                  <div class="form-edit">
                  <h5 class="card-title">
                    <!-- ////////////// CONDITIONS AFFICHAGE PALIER (A MODIF) //////////////////////////////////////////// -->
                    @if($item->IT_PALLIER != "null")
                      <span style="color:#ffb900"> [ P<span id="P{{ $item->IT_ID }}">{{ $item->IT_PALLIER }}</span> ]</span>
                    @endif
                  
                    <!-- ////////////// AFFICHAGE INFOS //////////////////////////////////////////// -->
                    <span class="nom" id="N{{ $item->IT_ID }}">{{ $item->IT_NAME }}</span>
                    <p class="card-text">
                      <!-- ////////////// AFFICHAGE ID //////////////////////////////////////////// -->
                      <span id="nom" style="color:#00c897"> #{{ $item->IT_ID }}</span>
                      <br/>
                      <!-- ////////////// AFFICHAGE VIT //////////////////////////////////////////// -->
                      @if($item->ITS_VIT != "")
                      VIT <span id="V{{ $item->IT_ID }}" style="color:red;">{{ $item->ITS_VIT }}</span>
                      @endif
                      <!-- ////////////// AFFICHAGE DEF //////////////////////////////////////////// -->
                      @if($item->ITS_DEF != "")
                      DEF <span id="D{{ $item->IT_ID }}" style="color:red;">{{ $item->ITS_DEF }}</span>
                      @endif
                    </p>
                  </h5>
                    <form method="post"  action="" class="buttonEditSuppr">
                      {{ csrf_field() }}
                    <button type="button" id="{{ $item->IT_ID }}" class="btn btn-primary boutonEdit" onclick="edit(this.id)">Editer</button>
                    <a href="item/{{ $item->IT_ID }}"><button type="button" class="btn btn-primary boutonEdit"  >Détails</button></a>
                    <button type="button" id="{{ $item->IT_ID }}" class="btn btn-danger boutonSuprrimer" onclick="supprimer(this.id)">Supprimer</button>
                    </form>
                  </div>
                  </div>
              </div>
        @endforeach
      
      </div>
    </div>
  </div>
</div>  
</div>    
</div>    























            </div>
    </div>
  </div>
          </body>
</html>
