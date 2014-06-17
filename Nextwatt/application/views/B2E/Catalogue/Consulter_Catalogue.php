<div class="ace-settings-container" id="ace-settings-container">
    <!-- settings box goes here -->
</div>

<div class="page-header">
    <h1 align="center">
        CATALOGUE</br>
        <small><i class="ace-icon fa fa-angle-double-right"></i> Page d'accueil Catalogue</small>
    </h1>

<div class="btn-group">
        <a href="<?php echo site_url("catalogue/load_catalogue"); ?>">
        <button  type="button" class="btn btn-white btn-sm btn-primary">Lier type au produit</button>
        <button type="button" class="btn btn-white btn-sm btn-primary">Gérer la liste des types</button>
        <button type="button" class="btn btn-white btn-sm btn-primary">Lier options</button>
        <a href="<?php echo site_url("catalogue/load_catalogue"); ?>">
        <button type="button" class="btn btn-white btn-sm btn-primary">Charger Catalogue</button></a>
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

        $entete = array('En tête ');
        $nbLigneLu=0;
//        'rien'=>''
        $fichier=array()	;

        $fichierCatalogue = fopen("C:/wamp/www/B2E/Nextwatt/application/third_party/testupload/catalogue.txt", "r");
        if (!$fichierCatalogue)
        {
            echo "Echec de l'ouverture du fichier, le fichier catalogue.txt � l'adresse ressources/catalogue.txt";
        }
        else
        {
            while(!feof($fichierCatalogue))
            {
                $ligneFichier=	explode('_',								//Pour d�composer la ligne en tableau
                    //convertCarSpe
                    htmlspecialchars_decode(
                        htmlentities(								//Pour convertir les � en &eacute;
                            addslashes( 								//Pour eviteer les probl�me de '
                                mb_convert_encoding (						//Pour convertir le ANSII vers UTF-8
                                    fgets(
                                        $fichierCatalogue), 'UTF-8', 'ASCII')))));
                unset($ligneFichier[count($ligneFichier)-1]);				//On vire le dernier caract�re qui est le retour � la ligne
                if (!(empty($ligneFichier)))			//Si il y a une colone vide, on s'en ocuupe pas
                {
                    $nbLigneLu++;											//On incr�mente le compteur
                    if(array_key_exists($ligneFichier[0],$fichier))			//On v�rifie si il y a doublon dans les r�f�rences
                        echo 'ATTENTION il y a un doublon sur la r&eacute;f&eacute;rence ------- '.$ligneFichier[0].'<br/>';
                    $fichier[$ligneFichier[0]]=$ligneFichier;				//On range dans un tableau associatif avec la r�f�rence produit
                }
            }
            fclose($fichierCatalogue);
            // echo "Nombre de lignes lues => ".$nbLigneLu."<br />";
            unset ($fichier['rien']);

            $this->fonctionspersos->creerTableau($entete,$fichier);

//            foreach($fichier as $produit)
//            {
//                foreach($produit as $ligneproduit)
//                {
//                    echo $ligneproduit . '<br/>';
//                }
//            }


        }
        ?>
    </div>
</div>

            
