<div class="ace-settings-container" id="ace-settings-container">
    <!-- settings box goes here -->
</div>

<div class="page-header">
    <h1 align="center">
        CATALOGUE</br>
        <small><i class="ace-icon fa fa-angle-double-right"></i> Page d'accueil Catalogue</small>
    </h1>

    <div class="btn-group">
        <button type="button" class="btn btn-white btn-sm btn-primary">1er choix Yolo</button>
        <button type="button" class="btn btn-white btn-sm btn-primary">2eme choix Swag</button>
        <button type="button" class="btn btn-white btn-sm btn-primary">Combo YoloSwag</button>
        <button type="button" class="btn btn-white btn-sm btn-primary">Combo breaker</button>
    </div>

    <div id="nav-search" class="nav-search">
        <form class="form-search">
          <span class="input-icon">
            <input type="text" class="nav-search-input" id="nav-search-input" autocomplete="off"
                   placeholder="Search ..."/>
            <i class="ace-icon fa fa-search nav-search-icon"></i>
          </span>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <?php
        $fichierCatalogue;
        $fichier;
        $nbLigneLu;


        $file = fopen("C:/wamp/www/B2E/Nextwatt/application/third_party/testupload/catalogue.csv", "r") or exit("Unable to open file!");
        //Output a line of the file until the end is reached
//        while(!feof($file))
//        {
////            $ligneFichier=	explode('_',								//Pour d�composer la ligne en tableau
////                //convertCarSpe
////                htmlspecialchars_decode(
////                    htmlentities(								//Pour convertir les � en &eacute;
////                        addslashes( 								//Pour eviteer les probl�me de '
////                            mb_convert_encoding (						//Pour convertir le ANSII vers UTF-8
////                                fgets(
////                                    $fichierCatalogue), 'UTF-8', 'ASCII')))));
////            print_r($ligneFichier);
//        }
//        fclose($file);
        ?>
    </div>
</div>
            
