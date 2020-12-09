@extends('template')
 
@section('Contenuedepage')

    <!-- ////////////// FORMULAIRE (GRID-BOOTSTRAP) //////////////////////////////////////////// -->
    <form action="" class="formAddItem" method="POST">
    @csrf
    @foreach ($item as $item)
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
                            
                            <input type="text"  class="form-control" name="id" id="id" value="{{ $item->IT_ID }}" >
                            
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
                            <input type="text" class="form-control" name="nom" id="nom" value="{{ $item->IT_NAME }}">

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
                            <textarea class="form-control" name="lore" id="lore">{{ $item->IT_LORE }}</textarea>

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
                            <input type="text" class="form-control" name="pallier" id="pallier"  value="{{ $item->IT_PALLIER }}">

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
                            <input type="text" class="form-control" name="vit" id="vit"  value="{{ $item->ITS_VIT }}">

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
                            <input type="text" class="form-control" name="def" id="def" value="{{ $item->ITS_DEF }}">

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
    

    @endforeach
@endsection
