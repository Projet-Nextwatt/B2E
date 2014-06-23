<?php

class Fonctionspersos {


    public function creerTableau(array $contenu, array $entetes = NULL, $form = NULL) {
        if ($contenu == NULL OR ( isset($contenu[0]) AND $contenu[0] == '')) {
            echo '<h2>Attention: Aucune donn&eacutees &agrave; afficher dans le tableau</h2>';
        } else {
            //Requette pour voir si le tableau posède une colonne ID_*
            $presenceDunID = false;
            $tableau1 = current($contenu);
            foreach ($tableau1 as $nomDeLaColonne => $contenuDeLaColonne) {
                if (preg_match('#^ID#', $nomDeLaColonne)) {
                    $presenceDunID = $nomDeLaColonne; //Je stocke l'index de la colonne ID dans la varaible $presenceDunID
                }
            }

            //Requette pour remplir les entetes si elles n'ont pas été renseigner
            if ($entetes == NULL) {
                $tableau1 = current($contenu);
                foreach ($tableau1 as $nomDeLaColonne => $contenuDeLaColonne) {
                    $entetes[] = $nomDeLaColonne; //Je stocke l'index de la colonne ID dans la varaible $presenceDunID
                }
            }


            //Lancement d'un compteur pour identifier les colonnes
            $id = 0;
            echo '<div class="table-responsive">';
            echo '<table class="table table-striped table-bordered table-hover">';

            //En-tete
            echo '<thead>' . "\n";
            echo '<tr>' . "\n";
            foreach ($entetes as $entete) {
                echo '<th>' . $entete . '</th>' . "\n";
            }

            //Entete du bouton modifier
            if ($form != NULL) {
                echo '<th></th>';
            }
            echo '</tr>' . "\n";
            echo '</thead>' . "\n";

            //Contenu
            echo '<tbody>' . "\n";
            foreach ($contenu as $ligne) {
                echo '<tr id=';
                if (!($presenceDunID == false)) {
                    echo $ligne[$presenceDunID];
                } else {
                    echo $id;
                }
                $id++;

                echo '>' . "\n";
                foreach ($ligne as $cellule) {
                    echo '<td>' . $cellule . '</td>' . "\n";
                }

                //Bouton modifier
                if ($form != NULL) {
                    echo '<td><button class = "btn btn-xs btn-info" onclick="modifier(';
                    if (!($presenceDunID == false)) {
                        echo $ligne[$presenceDunID];
                    } else {
                        echo $id;
                    }
                    echo ')"><i class = "ace-icon fa fa-pencil bigger-120"></i></button></td>';
                }

                echo '</tr>' . "\n";
            }
            echo '</tbody>' . "\n";
            echo '</table>';
            echo '</div>';

            //Script qui permet de metre l'identifiant de la ligne à modifier en session codeigniter
            if ($form != NULL) {
                echo "  <script> 
                        function modifier(id){
                            $.post(
                                '../ajaxfonctionspersos/sessionpourform',
                                {'id':id},
                                function (){
                                    self.location.href='" . site_url($form) . "'                               }
                            );
                        }
                    </script>";
            }
        }
    }

    public function lire_fichier_catalogue()
    {
        $data = array();
        $data['minilogonextwatt'] = img_url('minilogonextwatt.png');

        $nbLigneLu=0;
//        'rien'=>''
        $fichier=array();

        $fichierCatalogue = fopen("C:/wamp/www/B2E/Nextwatt/upload/catalogue.txt", "r");
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

            return $fichier;

        }
    }

    public function set_entete()
    {
        $entete = array('Référence','Nom','Marque','Puissance','Libellé Mat','Libellé Mat sans marque','Libellé MO','Libellé Garantie','Prix MO','Prix Mat plancher','Prix annonce TTC','CEE TTC','TVA_MO','TVA Mat','Facturation','Type','Spec','Fiche Technique','Note');
        return $entete;
    }

}
