<?php

class Fonctionspersos {


    public function creerTableau(   array $contenu, 
                                    array $entetes = NULL,
                                    $form = NULL,
                                    $sup = NULL) {
        /* EXPLIQIATION
         * Fonction qui affiche un tableau bootStrapé / Acé
         * |||Attend un Array de données
         * 
         * en options
         * |||Attend OU PAS un array pour les entetes
         * ----- Pas d'entete --> indexs du tableau de données 
         *                        (genre pour les bases de données
         * 
         * |||Attend l'adresse du controleur de MODIFICATION 
         *       et crée le bouton d'envoi au formualaire
         * ----- et stocke l'id de la ligne à modifier dans 
         *       SESSION["adresse du formalaire"],
         *       les session sont celle de code ignter
         * 
         * ||Attend l'adresse du controleur de suppression
         *       et creer un bouton de suppression
         *       avec pop-up de confirmation
         */
        
        
        if ($contenu == NULL OR ( isset($contenu[0]) AND $contenu[0] == '')) {
            echo '<h2>Attention: Aucune donn&eacutees &agrave; afficher dans le tableau</h2>';
        } else {
            //Requette pour voir si le tableau posède une colonne "id" 
            $presenceDunID = false;
            $tableau1 = current($contenu);
            foreach ($tableau1 as $nomDeLaColonne => $contenuDeLaColonne) {
                if (preg_match('#^id#', $nomDeLaColonne)) {
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


            //Ouvertre du tableau
            echo '<div class="table-responsive">';
            echo '<table class="table table-striped table-bordered table-hover">';

        //En-tete
            echo '<thead>' . "\n";
            echo '<tr>' . "\n";
            foreach ($entetes as $entete) {
                echo '<th>' . $entete . '</th>' . "\n";
            }

            //Entete du bouton modifier
            if ($form != NULL OR $sup != NULL) {
                echo '<th></th>';
            }
            
            echo '</tr>' . "\n";
            echo '</thead>' . "\n";

        //Contenu
            echo '<tbody>' . "\n";
            foreach ($contenu as $ligne) {
                echo '<tr ';
                if (!($presenceDunID == false)) {
                    echo 'id='.$ligne[$presenceDunID];
                }

                echo '>' . "\n";
                foreach ($ligne as $cellule) {
                    echo '<td>' . $cellule . '</td>' . "\n";
                }

                
                if (($presenceDunID != false) AND ($form != NULL OR $sup != NULL)) {
                    echo '<td>';
                //Bouton modifier
                    if ($form != NULL) {
                        echo '<button class = "btn btn-xs btn-info" onclick="modifier(';
                        echo $ligne[$presenceDunID];
                        echo ')"><i class = "ace-icon fa fa-pencil bigger-120"></i></button>';
                    }
                
                //Bouton supprimer
                    if ($sup != NULL) {
                        echo '<button class = "btn btn-xs btn-danger" onclick="confirme_supprimer(';
                        echo $ligne[$presenceDunID];
                        echo ')"><i class = "ace-icon fa fa-ban bigger-120"></i></button>';
                    }
                    echo '</td>';
                }

                echo '</tr>' . "\n";
            }
            echo '</tbody>' . "\n";
            echo '</table>';
            echo '</div>';

            //Script qui permet de metre l'identifiant de la ligne à modifier en session codeigniter
            //La varaible en session aura le nom du 
            if ($form != NULL) {
                echo "  <script> 
                        function modifier(id){
                            $.post(
                                '../ajaxfonctionspersos/sessionpourform',
                                {'id':id,
                                 'form':'".$form."'},
                                function (){
                                    self.location.href='" . site_url($form) . "'                               }
                            );
                        }
                    </script>";
            }
            
            if ($sup != NULL) {
                echo "  <script> 
                            function confirme_supprimer(idDossier) {
                            if (confirm('Voulez-vous vraimment supprimer l\'énergie n=' + idDossier)) {
                                $.post(
                                        '../".$sup."',
                                        {'id': idDossier},
                                function() {
                                      location.reload();
                                }   
                            );
                        }
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

        $fichierCatalogue = fopen("./upload/catalogue.txt", "r");
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

                        htmlentities(								//Pour convertir les � en &eacute;
                            addslashes( 								//Pour eviteer les probl�me de '
                                mb_convert_encoding (						//Pour convertir le ANSII vers UTF-8
                                    fgets(
                                        $fichierCatalogue), 'UTF-8', 'ASCII'))));
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
