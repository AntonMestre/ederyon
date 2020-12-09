@extends('template')
 
@section('Contenuedepage')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- ////////////// TITRE PAGE //////////////////////////////////////////// -->
    <div class=" container titre01">
      <h1 class="display-4"><img width="5%" style="margin-right:20px;" src="{{ asset('img/additem/etabpng.png') }}" >Les items</h1>
    </div>



    <!-- ////////////// PAGE DE VISU //////////////////////////////////////////// -->
    <div class="container visuItems">
      <!-- ////////////// FORM POUR CHOISIR LA RECHERCHE //////////////////////////////////////////// -->
      <form action="" method="POST" class="formSelectItem">
        @csrf
          <div class="form-row align-items-center">
            <div class="col-auto my-1">
                <select class="custom-select mr-sm-2" name="choix" id="inlineFormCustomSelect">
                  <option selected>Choisissez...</option>
                  <option value="IT_ID">ID</option>
                  <option value="IT_NAME">Nom</option>
                  <option value="ITT_NAME">Type</option>
                  <option value="IT_PALLIER">Pallier</option>
                </select>
            </div>
            <div class="col-auto my-1">
              <div class="custom-control custom-checkbox mr-sm-2">
                  <label class="sr-only" for="inlineFormInputName">Name</label>
                  <input type="text" class="form-control" name="entree" id="inlineFormInputName" placeholder="">
              </div>
            </div>
            <div class="col-auto my-1">
              <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
          </div>
        </form>

        <!-- ////////////// AFFICHAGE RESULTAT //////////////////////////////////////////// -->
        <div data-spy="scroll" data-target="#navbar-example2" data-offset="0" style="position:relative;height:500px;overflow-y: scroll;">
          <div class="container">
            <div class="row">
              <div class="card-columns" >

                <!-- ////////////// BOUCLE BLADE POUR AFFICHER //////////////////////////////////////////// -->
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

      <!-- ////////////// REQUETE SUPP / MODIF //////////////////////////////////////////// -->
      <script>

        function supprimer(id)
        {
          var pallier=$("#P"+id).text();
          var nomI=$("#N"+id).text();
          var vit=$("#V"+id).text();
          var def=$("#D"+id).text();

          $("#C"+id).children().children().remove();
                $("#C"+id).children().append('\
                          <h5 class="card-title">\
                            <span>Êtes vous sûrs de vouloir supprimer cet item ?</span>\
                          </h5>\
                            <form method="post"  action="" class="">\
                              {{ csrf_field() }}\
                             <button type="button" id="'+id+'" class="btn btn-success boutonSuprrimer" onclick="supprimerNext(this.id)">V</button>\
                             <button id='+id+' type="button" onclick="annule(this.id,'+pallier+',\''+nomI+'\','+vit+','+def+')" class="btn btn-danger">X</button>\
                            </form>\
                          </div>');

        }
        function supprimerNext(id){
          // AJAX REQUEST POUR SUPPR
          $.ajaxSetup({
          headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            $.ajax({
              url:'/item/supprimer',
              method:'POST',
              data:{IT_ID:id},
              success: function (result) {
                  $("#C"+ result.result).remove();
              }
            });
        }

        function edit(id)
        {
          
          var pallier=$("#P"+id).text();
          var nomI=$("#N"+id).text();
          var vit=$("#V"+id).text();
          var def=$("#D"+id).text();


          $("#C"+id).children().children().remove();
          $("#C"+id).children().append('\
          <form action="" method="POST" >\
            {{ csrf_field() }}\
            <div class="form-group">\
              <label for="PallierI">Pallier</label>\
              <input type="text" class="form-control" id="PallierI'+id+'" value="'+pallier+'">\
            </div>\
            <div class="form-group">\
              <label for="NomI">Nom</label>\
              <input type="text" class="form-control" id="NomI'+id+'" value="'+nomI+'">\
            </div>\
            <button id='+id+' type="button" onclick="confirmEdit(this.id)" class="btn btn-primary">Envoyer</button>\
            <button id='+id+' type="button" onclick="annule(this.id,'+pallier+',\''+nomI+'\','+vit+','+def+')" class="btn btn-danger">X</button>\
          </form>');

        }

        function annule(id,pallier,nomI,vit,def){
          $("#C"+id).children().children().remove();
                $("#C"+id).children().append('\
                          <h5 class="card-title">\
                            <!-- ////////////// CONDITIONS AFFICHAGE PALIER (A MODIF) //////////////////////////////////////////// -->\
                            @if($item->IT_PALLIER != "null")\
                              <span style="color:#ffb900"> [ P<span id="P'+id+'">'+pallier+'</span> ]</span>\
                            @endif\
                          \
                            <!-- ////////////// AFFICHAGE INFOS //////////////////////////////////////////// -->\
                            <span class="nom" id="N'+id+'">'+nomI+'</span>\
                            <p class="card-text">\
                              <!-- ////////////// AFFICHAGE ID //////////////////////////////////////////// -->\
                              <span id="nom" style="color:#00c897"> #'+id+'</span>\
                              <br/>');

                              if(vit != null){
                                $("#C"+id).children().append('\
                                <!-- ////////////// AFFICHAGE VIT //////////////////////////////////////////// -->\
                                <h5 class="card-title">\
                                VIT <span id="V'+id+'" style="color:red;">'+vit+'</span>\
                                </h5>');
                              }

                              if(def != null){
                                $("#C"+id).children().append('\
                                <!-- ////////////// AFFICHAGE DEF //////////////////////////////////////////// -->\
                                <h5 class="card-title">\
                                DEF <span id="D'+id+'" style="color:red;">'+def+'</span>\
                                 </h5>');
                              }

                              $("#C"+id).children().append('\
                             </p>\
                            </h5>\
                            <form method="post"  action="" class="buttonEditSuppr">\
                              {{ csrf_field() }}\
                            <button type="button" id="'+id+'" class="btn btn-primary boutonEdit" onclick="edit(this.id)">Editer</button>\
                            <a href="item/{{ $item->IT_ID }}"><button type="button" class="btn btn-primary boutonEdit"  >Détails</button></a>\
                            <button type="button" id="'+id+'" class="btn btn-danger boutonSuprrimer" onclick="supprimer(this.id)">Supprimer</button>\
                            </form>\
                          </div>');
        };

        function confirmEdit(id){
            var newPallier=$("#PallierI"+id).val();
            var newNomI=$("#NomI"+id).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
              url:'/item/mini_modif',
              method:'POST',
              data:{
                    id:id,
                    pallier:newPallier,
                    nom:newNomI
              },
              success: function () { 
                $("#C"+id).children().children().remove();
                $("#C"+id).children().append('\
                          <h5 class="card-title">\
                            <!-- ////////////// CONDITIONS AFFICHAGE PALIER (A MODIF) //////////////////////////////////////////// -->\
                            @if($item->IT_PALLIER != "null")\
                              <span style="color:#ffb900"> [ P<span id="P'+id+'">'+pallier+'</span> ]</span>\
                            @endif\
                          \
                            <!-- ////////////// AFFICHAGE INFOS //////////////////////////////////////////// -->\
                            <span class="nom" id="N'+id+'">'+nomI+'</span>\
                            <p class="card-text">\
                              <!-- ////////////// AFFICHAGE ID //////////////////////////////////////////// -->\
                              <span id="nom" style="color:#00c897"> #'+id+'</span>\
                              <br/>');

                              if(vit != null){
                                $("#C"+id).children().append('\
                                <!-- ////////////// AFFICHAGE VIT //////////////////////////////////////////// -->\
                                <h5 class="card-title">\
                                VIT <span id="V'+id+'" style="color:red;">'+vit+'</span>\
                                </h5>');
                              }

                              if(def != null){
                                $("#C"+id).children().append('\
                                <!-- ////////////// AFFICHAGE DEF //////////////////////////////////////////// -->\
                                <h5 class="card-title">\
                                DEF <span id="D'+id+'" style="color:red;">'+def+'</span>\
                                 </h5>');
                              }

                              $("#C"+id).children().append('\
                             </p>\
                            </h5>\
                            <form method="post"  action="" class="buttonEditSuppr">\
                              {{ csrf_field() }}\
                            <button type="button" id="'+id+'" class="btn btn-primary boutonEdit" onclick="edit(this.id)">Editer</button>\
                            <a href="item/{{ $item->IT_ID }}"><button type="button" class="btn btn-primary boutonEdit"  >Détails</button></a>\
                            <button type="button" id="'+id+'" class="btn btn-danger boutonSuprrimer" onclick="supprimer(this.id)">Supprimer</button>\
                            </form>\
                          </div>');

              }
            });
          }
        
      </script>
@endsection




