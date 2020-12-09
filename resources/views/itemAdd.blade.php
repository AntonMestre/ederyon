@extends('template')
 
@section('Contenuedepage')

    <!-- ////////////// TITRE PAGE //////////////////////////////////////////// -->
    <div class=" container titre01">
        <h1 class="display-4"><img width="5%" style="margin-right:20px;" src="{{ asset('img/additem/etabpng.png') }}" >Ajouter un item</h1>
    </div>

    <!-- ////////////// FORMULAIRE (GRID-BOOTSTRAP) //////////////////////////////////////////// -->
    <form action="" class="formAddItem" method="POST">
    @csrf
    <!-- CONTAINER PINCIPAL -->
    <div class="container principal01">
        <div class="row">
            <h3 class="titreSec01">Informations générales</h1>
        </div>
        <!-- 1 LIGNE -->
        <div class="row">
            <!-- COLONNE GAUCHE -->
            <div class="col" style="margin-left: 60px;">
                <!-- CONTENUE COLONNE -->
                <div class="container">
                    <!-- LIGNE 1 -->
                    <div class="row row01">
                        <!-- DIVISION CONTENUE EN DEUX COLONNES -->
                        <div class="col border-col">
                        
                            <!-- CONTENUE COLONNE GAUCHE -->
                            <label for="id">ID</label>
                            <input type="text"  class="form-control" name="id" id="id">

                        </div>
                        <div class="col">

                            <!-- CONTENUE COLONNE DROITE -->
                            <small class="form-text text-muted">Format : 
                                   <br/> - String
                                   <br/> - 6 caractères au maximum</small>

                        </div>
                    </div>
                    <!-- LIGNE 2 -->
                    <div class="row row01">
                        <!-- DIVISION CONTENUE EN DEUX COLONNES -->
                        <div class="col border-col">

                            <!-- CONTENUE COLONNE GAUCHE -->
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" name="nom" id="nom">

                        </div>
                        <div class="col">

                            <!-- CONTENUE COLONNE DROITE -->
                            <small class="form-text text-muted">Format : 
                                <br/> - String
                                <br/> - 30 caractères au maximum</small>

                        </div>                        
                    </div>
                    <!-- LIGNE 3 -->
                    <div class="row row01">
                        <!-- DIVISION CONTENUE EN DEUX COLONNES -->
                        <div class="col border-col">
                            
                            <!-- CONTENUE COLONNE GAUCHE -->
                            <label for="pro">Type</label>

                            <select class="custom-select" name="type">

                                    @foreach ($itemsType as $itemsTypes)
                                        <option value="{{ $itemsTypes->ITT_NAME }}">{{ $itemsTypes->ITT_NAME }}</option>
                                    @endforeach   

                              </select>
                              
                        </div>
                        <div class="col">

                            <!-- CONTENUE COLONNE DROITE -->
                            <small class="form-text text-muted">Format : </small>


                        </div>                               
                    </div>
                </div>
            <!--FIN COLONNE GAUCHE -->
            </div>
            <!-- COLONNE DROITE -->
            <div class="col">
                <!-- CONTENUE COLONNE -->
                <div class="container">
                    <!-- LIGNE 1 -->
                    <div class="row row01">
                        <!-- DIVISION CONTENUE EN DEUX COLONNES -->
                        <div class="col border-col">

                            <!-- CONTENUE COLONNE GAUCHE -->
                            <label for="lore">Lore</label>
                            <textarea class="form-control" name="lore" id="lore"></textarea>

                        </div>
                        <div class="col">

                            <!-- CONTENUE COLONNE DROITE -->
                            <small class="form-text text-muted">Format : 
                                <br/> - String
                                <br/> - 200 caractères au maximum</small>
                            
                        </div>                               
                    </div>
                    <!-- LIGNE 2 -->
                    <div class="row row01">
                        <!-- DIVISION CONTENUE EN DEUX COLONNES -->
                        <div class="col border-col">
                            
                            <!-- CONTENUE COLONNE GAUCHE -->
                            <label for="pallier">Pallier</label>
                            <input type="text" class="form-control" name="pallier" id="pallier">

                        </div>
                        <div class="col">

                            <!-- CONTENUE COLONNE DROITE -->
                            <small class="form-text text-muted">Format : 
                                <br/> - String
                                <br/> - 2 caractère au maximum</small>

                        </div>                               
                    </div>


                </div>
            <!--FIN COLONNE DROITE -->
            </div>
        <!-- FIN DE LA LIGNE -->
        </div>

        <div class="row">
            <hr style="background-color:rbga(0,0,0,1); width:90%;" />
        </div>
        <div class="row">
            <h3 style="padding-left :25px;padding-top:15px;">POID</h1>
        </div>

        <div class="poid">
            <label for="poid">Poid</label>
            <input type="text" class="form-control" name="poid" id="poidText">
            Poid restant :<span id="poidRestant"> </span>
        </div>



        <!-- 2 LIGNE -->
        <div class="row">
            <hr style="background-color:rbga(0,0,0,1); width:90%;" />
            <h3 class="titreSec01">Statistiques</h1>
        </div>

        <div class="row">
            

            <!-- COLONNE GAUCHE -->
            <div class="col "style="margin-left: 60px;">
                <!-- CONTENUE COLONNE -->
                <div class="container">
                    <!-- LIGNE 1 -->
                    <div class="row row01">
                        <!-- DIVISION CONTENUE EN DEUX COLONNES -->
                        <div class="col border-col">

                            <!-- CONTENUE COLONNE GAUCHE -->
                            <label for="vit">Vitalité</label>
                            <input type="text" class="form-control" name="vit" id="vit">

                        </div>
                        <div class="col">

                            <!-- CONTENUE COLONNE DROITE -->
                            <small class="form-text text-muted">Format : 
                                <br/> - Chiffre
                                <br/> - 11 caractères au maximum</small>

                        </div>                               
                    </div>
                    <!--FIN CONTAINER -->
                </div>
            <!--FIN COLONNE GAUCHE -->
            </div>
            <!-- COLONNE DROITE -->
            <div class="col">
                <!-- CONTENUE COLONNE -->
                <div class="container">
                    
                    <!-- LIGNE 2 -->
                    <div class="row row01">
                        <!-- DIVISION CONTENUE EN DEUX COLONNES -->
                        <div class="col border-col">

                            <!-- CONTENUE COLONNE GAUCHE -->
                            <label for="def">Défense</label>
                            <input type="text" class="form-control" name="def" id="def">

                        </div>
                        <div class="col">

                            <!-- CONTENUE COLONNE DROITE -->
                            <small class="form-text text-muted">Format : 
                                <br/> - Chiffre
                                <br/> - 11 caractères au maximum</small>

                        </div>                               
                    </div>
                </div>
            <!--FIN COLONNE DROITE -->
            </div>            
        </div>
        <div class="row">
            

            <!-- COLONNE GAUCHE -->
            <div class="col "style="margin-left: 60px;">
                <!-- CONTENUE COLONNE -->
                <div class="container">
                    <!-- LIGNE 1 -->
                    <div class="row row01">
                        <!-- DIVISION CONTENUE EN DEUX COLONNES -->
                        <div class="col border-col">

                            <!-- CONTENUE COLONNE GAUCHE -->
                            <label for="ene">Energie</label>
                            <input type="text" class="form-control" name="ene" id="ene">

                        </div>
                        <div class="col">

                            <!-- CONTENUE COLONNE DROITE -->
                            <small class="form-text text-muted">Format : 
                                <br/> - Chiffre
                                <br/> - 11 caractères au maximum</small>

                        </div>                               
                    </div>
                    <!--FIN CONTAINER -->
                </div>
            <!--FIN COLONNE GAUCHE -->
            </div>
            <!-- COLONNE DROITE -->
            <div class="col">
                <!-- CONTENUE COLONNE -->
                <div class="container">
                    
                    <!-- LIGNE 2 -->
                    <div class="row row01">
                        <!-- DIVISION CONTENUE EN DEUX COLONNES -->
                        <div class="col border-col">

                            <!-- CONTENUE COLONNE GAUCHE -->
                            <label for="reg">Regeneration</label>
                            <input type="text" class="form-control" name="reg" id="reg">

                        </div>
                        <div class="col">

                            <!-- CONTENUE COLONNE DROITE -->
                            <small class="form-text text-muted">Format : 
                                <br/> - Chiffre
                                <br/> - 11 caractères au maximum</small>

                        </div>                               
                    </div>
                </div>
            <!--FIN COLONNE DROITE -->
            </div>            
        </div>
        <div class="row">
            

            <!-- COLONNE GAUCHE -->
            <div class="col "style="margin-left: 60px;">
                <!-- CONTENUE COLONNE -->
                <div class="container">
                    <!-- LIGNE 1 -->
                    <div class="row row01">
                        <!-- DIVISION CONTENUE EN DEUX COLONNES -->
                        <div class="col border-col">

                            <!-- CONTENUE COLONNE GAUCHE -->
                            <label for="conc">Concentration</label>
                            <input type="text" class="form-control" name="conc" id="conc">

                        </div>
                        <div class="col">

                            <!-- CONTENUE COLONNE DROITE -->
                            <small class="form-text text-muted">Format : 
                                <br/> - Chiffre
                                <br/> - 11 caractères au maximum</small>

                        </div>                               
                    </div>
                    <!--FIN CONTAINER -->
                </div>
            <!--FIN COLONNE GAUCHE -->
            </div>
            <!-- COLONNE DROITE -->
            <div class="col">
                <!-- CONTENUE COLONNE -->
                <div class="container">
                    
                    <!-- LIGNE 2 -->
                    <div class="row row01">
                        <!-- DIVISION CONTENUE EN DEUX COLONNES -->
                        <div class="col border-col">

                            <!-- CONTENUE COLONNE GAUCHE -->
                            <label for="vite">Vitesse</label>
                            <input type="text" class="form-control" name="vite" id="vite">

                        </div>
                        <div class="col">

                            <!-- CONTENUE COLONNE DROITE -->
                            <small class="form-text text-muted">Format : 
                                <br/> - Chiffre
                                <br/> - 11 caractères au maximum</small>

                        </div>                               
                    </div>
                </div>
            <!--FIN COLONNE DROITE -->
            </div>            
        </div>
        <div class="row">
            

            <!-- COLONNE GAUCHE -->
            <div class="col "style="margin-left: 60px;">
                <!-- CONTENUE COLONNE -->
                <div class="container">
                    <!-- LIGNE 1 -->
                    <div class="row row01">
                        <!-- DIVISION CONTENUE EN DEUX COLONNES -->
                        <div class="col border-col">

                            <!-- CONTENUE COLONNE GAUCHE -->
                            <label for="pui">Puissance</label>
                            <input type="text" class="form-control" name="pui" id="pui">

                        </div>
                        <div class="col">

                            <!-- CONTENUE COLONNE DROITE -->
                            <small class="form-text text-muted">Format : 
                                <br/> - Chiffre
                                <br/> - 11 caractères au maximum</small>

                        </div>                               
                    </div>
                    <!--FIN CONTAINER -->
                </div>
            <!--FIN COLONNE GAUCHE -->
            </div>
            <!-- COLONNE DROITE -->
            <div class="col">
                <!-- CONTENUE COLONNE -->
                <div class="container">
                    
                    <!-- LIGNE 2 -->
                    <div class="row row01">
                        <!-- DIVISION CONTENUE EN DEUX COLONNES -->
                        <div class="col border-col">

                            <!-- CONTENUE COLONNE GAUCHE -->
                            <label for="crit">Critique</label>
                            <input type="text" class="form-control" name="crit" id="crit">

                        </div>
                        <div class="col">

                            <!-- CONTENUE COLONNE DROITE -->
                            <small class="form-text text-muted">Format : 
                                <br/> - Chiffre
                                <br/> - 11 caractères au maximum</small>

                        </div>                               
                    </div>
                </div>
            <!--FIN COLONNE DROITE -->
            </div>            
        </div>
        <div class="row">
            

            <!-- COLONNE GAUCHE -->
            <div class="col "style="margin-left: 60px;">
                <!-- CONTENUE COLONNE -->
                <div class="container">
                    <!-- LIGNE 1 -->
                    <div class="row row01">
                        <!-- DIVISION CONTENUE EN DEUX COLONNES -->
                        <div class="col border-col">

                            <!-- CONTENUE COLONNE GAUCHE -->
                            <label for="esq">Esquive</label>
                            <input type="text" class="form-control" name="esq" id="esq">

                        </div>
                        <div class="col">

                            <!-- CONTENUE COLONNE DROITE -->
                            <small class="form-text text-muted">Format : 
                                <br/> - Chiffre
                                <br/> - 11 caractères au maximum</small>

                        </div>                               
                    </div>
                    <!--FIN CONTAINER -->
                </div>
            <!--FIN COLONNE GAUCHE -->
            </div>
            <!-- COLONNE DROITE -->
            <div class="col">
                <!-- CONTENUE COLONNE -->
                <div class="container">
                    
                    <!-- LIGNE 2 -->
                    <div class="row row01">
                        <!-- DIVISION CONTENUE EN DEUX COLONNES -->
                        <div class="col border-col">

                            <!-- CONTENUE COLONNE GAUCHE -->
                            <label for="mel">Melee</label>
                            <input type="text" class="form-control" name="mel" id="mel">

                        </div>
                        <div class="col">

                            <!-- CONTENUE COLONNE DROITE -->
                            <small class="form-text text-muted">Format : 
                                <br/> - Chiffre
                                <br/> - 11 caractères au maximum</small>

                        </div>                               
                    </div>
                </div>
            <!--FIN COLONNE DROITE -->
            </div>            
        </div>
        <div class="row">
            

            <!-- COLONNE GAUCHE -->
            <div class="col "style="margin-left: 60px;">
                <!-- CONTENUE COLONNE -->
                <div class="container">
                    <!-- LIGNE 1 -->
                    <div class="row row01">
                        <!-- DIVISION CONTENUE EN DEUX COLONNES -->
                        <div class="col border-col">

                            <!-- CONTENUE COLONNE GAUCHE -->
                            <label for="dis">Distance</label>
                            <input type="text" class="form-control" name="dis" id="dis">

                        </div>
                        <div class="col">

                            <!-- CONTENUE COLONNE DROITE -->
                            <small class="form-text text-muted">Format : 
                                <br/> - Chiffre
                                <br/> - 11 caractères au maximum</small>

                        </div>                               
                    </div>
                    <!--FIN CONTAINER -->
                </div>
            <!--FIN COLONNE GAUCHE -->
            </div>
            <!-- COLONNE DROITE -->
            <div class="col">
                <!-- CONTENUE COLONNE -->
                <div class="container">
                    
                    <!-- LIGNE 2 -->
                    <div class="row row01">
                        <!-- DIVISION CONTENUE EN DEUX COLONNES -->
                        <div class="col border-col">

                            <!-- CONTENUE COLONNE GAUCHE -->
                            <label for="deg">Degât</label>
                            <input type="text" class="form-control" name="deg" id="deg">

                        </div>
                        <div class="col">

                            <!-- CONTENUE COLONNE DROITE -->
                            <small class="form-text text-muted">Format : 
                                <br/> - Chiffre
                                <br/> - 11 caractères au maximum</small>

                        </div>                               
                    </div>
                </div>
            <!--FIN COLONNE DROITE -->
            </div>            
        </div>
        <div class="row">
            

            <!-- COLONNE GAUCHE -->
            <div class="col "style="margin-left: 60px;">
                <!-- CONTENUE COLONNE -->
                <div class="container">
                    <!-- LIGNE 1 -->
                    <div class="row row01">
                        <!-- DIVISION CONTENUE EN DEUX COLONNES -->
                        <div class="col border-col">

                            <!-- CONTENUE COLONNE GAUCHE -->
                            <label for="soin">Soin</label>
                            <input type="text" class="form-control" name="soin" id="soin">

                        </div>
                        <div class="col">

                            <!-- CONTENUE COLONNE DROITE -->
                            <small class="form-text text-muted">Format : 
                                <br/> - Chiffre
                                <br/> - 11 caractères au maximum</small>

                        </div>                               
                    </div>
                    <!--FIN CONTAINER -->
                </div>
            <!--FIN COLONNE GAUCHE -->
            </div>
            <!-- COLONNE DROITE -->
            <div class="col">
                <!-- CONTENUE COLONNE -->
                <div class="container">
                    
                    <!-- LIGNE 2 -->
                    <div class="row row01">
                        <!-- DIVISION CONTENUE EN DEUX COLONNES -->
                        <div class="col border-col">

                            <!-- CONTENUE COLONNE GAUCHE -->
                            <label for="pro">Provocation</label>
                            <input type="text" class="form-control" name="pro" id="pro">

                        </div>
                        <div class="col">

                            <!-- CONTENUE COLONNE DROITE -->
                            <small class="form-text text-muted">Format : 
                                <br/> - Chiffre
                                <br/> - 11 caractères au maximum</small>

                        </div>                               
                    </div>
                </div>
            <!--FIN COLONNE DROITE -->
            </div>            
        </div>
        <div class="row">
            

            <!-- COLONNE GAUCHE -->
            <div class="col "style="margin-left: 60px;">
                <!-- CONTENUE COLONNE -->
                <div class="container">
                    <!-- LIGNE 1 -->
                    <div class="row row01">
                        <!-- DIVISION CONTENUE EN DEUX COLONNES -->
                        <div class="col border-col">

                            <!-- CONTENUE COLONNE GAUCHE -->
                            <label for="cont">Controle</label>
                            <input type="text" class="form-control" name="cont" id="cont">

                        </div>
                        <div class="col">

                            <!-- CONTENUE COLONNE DROITE -->
                            <small class="form-text text-muted">Format : 
                                <br/> - Chiffre
                                <br/> - 11 caractères au maximum</small>

                        </div>                               
                    </div>
                    <!--FIN CONTAINER -->
                </div>
            <!--FIN COLONNE GAUCHE -->
            </div>
            <!-- COLONNE DROITE -->
            <div class="col">
                <!-- CONTENUE COLONNE -->
                <div class="container">
                    
                    <!-- LIGNE 2 -->
                    <div class="row row01">
                        <!-- DIVISION CONTENUE EN DEUX COLONNES -->
                        <div class="col border-col">



                        </div>                               
                    </div>
                </div>
            <!--FIN COLONNE DROITE -->
            </div>            
        </div>
        <center><input type="submit" class="btn btn-primary" style="margin-top:10px;" value="Envoyer !"></center>
    <!-- FIN CONTAINER PINCIPAL -->
    </div>
    <!-- FIN FORMULAIRE-->
    </form>

    <!-- ERREURS-->
    <div class="container erreur01">
        <h1>Erreur(s) formulaire</h1> 
        <ul>
        @foreach ($errors->all() as $error)
        <li style="color:red;">{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    
    <script>
        
        var poid;

        $("#poidText").on('keyup',function (){
            $("#poidRestant").empty();
            poid=$("#poidText").val();
            $("#poidRestant").append(poid);
        });
        $("#vit").on('keyup',function (){
            $("#poidRestant").empty();
            var vit=$("#vit").val();
            poidDiff=vit*0.5;
            diff=poid-poidDiff;
            $("#poidRestant").append(diff);
        });

    </script>


@endsection
