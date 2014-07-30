<?php

class Fonctionspersos
{


    public function creerTableau(array $contenu,
                                 array $entetes = NULL,
                                 $form = NULL,
                                 $sup = NULL,
                                 $checkbox = false,
                                 $parametres = NULL)
    {
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
         *       et crée le bouton d'envoi au formulaire
         * ----- et stocke l'id de la ligne à modifier dans 
         *       SESSION["adresse du formulaire"],
         *       les session sont celle de code igniter
         * 
         * ||Attend l'adresse du controleur de suppression
         *       et creer un bouton de suppression
         *       avec pop-up de confirmation
         * 
         * ||Attend juste un TRUE
         *       permet de converir les 1 et 0 en checkbox validée
         *       ou en rien du tout
         */

        if ($contenu == NULL OR (isset($contenu[0]) AND $contenu[0] == '')) {
            echo '<p><strong>Attention: Aucune donn&eacutees &agrave; afficher dans le tableau</strong></p>';
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
                    if ($nomDeLaColonne != 'id') {
                    $entetes[] = $nomDeLaColonne; //Je stocke l'index de la colonne ID dans la variable $presenceDunID
                    }
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
            /*if ($form != NULL OR $sup != NULL) {
                echo '<th></th>';
            }*/

            echo '</tr>' . "\n";
            echo '</thead>' . "\n";

            //Contenu
            echo '<tbody>' . "\n";
            foreach ($contenu as $ligne) {
                echo '<tr ';

                //On met un id
//                if (!($presenceDunID == false)) {
//                    echo 'id=' . $ligne[$presenceDunID].' ';
//                }


                if ($form != NULL) {
                    echo 'onclick="modifier(';
                    echo $ligne[$presenceDunID];
                    echo ')" style="cursor:pointer" ';
                }

                echo '>' . "\n";
                foreach ($ligne as $index => $cellule) {
                    //Modification du texte si c'est l'option checkbox est active
                    if ($checkbox == true AND $index != 'id') {
                        if ($cellule == '1') {
                            //$cellule = '<i class="ace-icon glyphicon glyphicon-ok"></i>';
                            $cellule = '<div class="align-center"><i class="fa fa-check"></i></div>';
                        } elseif ($cellule == '0') {
                            $cellule = '';
                        }
                    }
                    if ($index != 'id') {
                        echo '<td>' . $cellule . '</td>' . "\n";
                    }
                }


                /*if (($presenceDunID != false) AND ($form != NULL OR $sup != NULL)) {
                    echo '<td>';
                    //Bouton supprimer
                    if ($sup != NULL) {
                        echo '<button class = "btn btn-xs btn-danger" onclick="confirme_supprimer(';
                        echo $ligne[$presenceDunID];
                        echo ')"><i class = "ace-icon fa fa-ban bigger-120"></i></button>';
                    }
                    echo '</td>';
                }*/

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
                                '" . site_url('ajaxfonctionspersos/sessionpourform') . "',
                                {'id':id,
                                 'form':'" . $form . "'},
                                function (){
                                    self.location.href='" . site_url($form) . "'                               }
                            );
                        }
                    </script>";
            }

            if ($sup != NULL) {
                echo "  <script> 
                            function confirme_supprimer(idDossier) {
                            if (confirm('Voulez-vous vraimment supprimer l\'entrée numéro ' + idDossier)) {
                                $.post(
                                        '../" . $sup . "',
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

    public function creerDropdown(array $donnees, $selected, $nom, $class = "dropdown")
    {
        /* Fonction qui génere une dropdown
         * Les données doivent etre structurées de la sorte
         * Pas besoin de les trier par label 
         * Pas besoin de nommer les index
         * $donnees =array( array( label => "",
         *                        value => "",
         *                        texte => "" ),
         *                  array( label => "",
         *                        value => "",
         *                        texte => "" ),
         *                   ...   =>   ...)
         */


        //Triage du tableau
        $donneestriees = array();
        $ligneavecindex = array();
        $label = NULL;
        foreach ($donnees as $ligne) {
            $i = 0;
            $ligneavecindex = array();
            foreach ($ligne as $cellule) {
                switch ($i) {
                    case 0:
                        $label = $cellule;
                        break;
                    case 1:
                        $ligneavecindex['value'] = $cellule;
                        break;
                    case 2:
                        $ligneavecindex['texte'] = $cellule;
                        break;
                }
                $i++;
            }
            if ($ligneavecindex['value'] == $selected OR $ligneavecindex['texte'] == $selected) {
                $ligneavecindex['selected'] = 'selected';
            } else {
                $ligneavecindex['selected'] = '';
            }
            $donneestriees[$label][] = $ligneavecindex;
        }

        echo '<select name="' . $nom . '" id="' . $nom . '" class="' . $class . '">';
        foreach ($donneestriees as $label => $groupe) {
            echo '<optgroup label="' . $label . '">';
            foreach ($groupe as $categorie) {
                echo '<option value="' . $categorie['value']
                    . '" ' . $categorie['selected']
                    . '>' . $categorie['texte'] . '</option>';
            }
            echo '</optgroup>';
        }
        echo '</select>';
        /*
                                <optgroup label="Alsace">
                                        <option value="1" selected >Colmar</option>
                                        <option value="2">Mulhouse</option>
                                        <option value="3">Strasbourg</option>
                                </optgroup></select>
        ';
         */

        return $donneestriees;
    }

    public function lire_fichier_catalogue()
    {


        $nbLigneLu = 0;
//        'rien'=>''
        $fichier = array();

        $fichierCatalogue = fopen("./upload/catalogue.txt", "r");
        if (!$fichierCatalogue) {
            echo "Echec de l'ouverture du fichier, le fichier catalogue.txt � l'adresse ressources/catalogue.txt";
        } else {
            while (!feof($fichierCatalogue)) {
                $ligneFichier = explode('|', //Pour d�composer la ligne en tableau
                    //convertCarSpe

                    htmlentities( //Pour convertir les � en &eacute;
//                        addslashes( //Pour eviteer les probl�me de '
                        mb_convert_encoding( //Pour convertir le ANSII vers UTF-8
                            fgets(
                                $fichierCatalogue), 'UTF-8', 'ASCII')));
                unset($ligneFichier[count($ligneFichier) - 1]); //On vire le dernier caract�re qui est le retour � la ligne
                if (!(empty($ligneFichier))) //Si il y a une colone vide, on s'en ocuupe pas
                {
                    $nbLigneLu++; //On incr�mente le compteur
                    if (array_key_exists($ligneFichier[0], $fichier)) //On v�rifie si il y a doublon dans les r�f�rences
                        echo 'ATTENTION il y a un doublon sur la r&eacute;f&eacute;rence ------- ' . $ligneFichier[0] . '<br/>';
                    $fichier[$ligneFichier[0]] = $ligneFichier; //On range dans un tableau associatif avec la r�f�rence produit
                }
            }
            fclose($fichierCatalogue);
            // echo "Nombre de lignes lues => ".$nbLigneLu."<br />";
            unset ($fichier['rien']);

            return $fichier;

        }
    }

    public function set_entete_catalogue_mini()
    {
        $entete = array('Référence', 'Nom', 'Marque', 'Puissance', 'Prix annonce TTC');
        return $entete;
    }

    public function set_entete_catalogue_complet()
    {
        $entete = array(
            'Référence',
            'Nom',
            'Marque',
            'Puissance',
            'Libelle_Mat',
            'Libelle_Mat_SansMarque',
            'Libelle_MO',
            'Libelle_Garantie',
            'Prix_MO',
            'Prix_Mat_Plancher',
            'Prix_Annonce_TTC',
            'CEE_TTC',
            'TVA_MO',
            'TVA_Mat',
            'Facturation',
            'Type_Produit',
            'Spec',
            'Actif',
            'Fiche_Tech',
            'Note');
        return $entete;
    }

    public function set_entete_clients()
    {
        $entete = array('Id', 'Nom', 'Prenom', 'Email', 'Telephone fixe', 'Telephone Portable', 'Responsable');
        return $entete;
    }

    public function creerListClient(array $contenu,
                                    $form = NULL,
                                    $sup = NULL)
    {
        if ($contenu == NULL OR (isset($contenu[0]) AND $contenu[0] == '')) {
            echo '<p><strong>Attention: Aucun client</strong></p>';
        } else {
            //Requette pour voir si le tableau posède une colonne "id" 
            $presenceDunID = false;
            $tableau1 = current($contenu);
            foreach ($tableau1 as $nomDeLaColonne => $contenuDeLaColonne) {
                if (preg_match('#^id#', $nomDeLaColonne)) {
                    $presenceDunID = $nomDeLaColonne; //Je stocke l'index de la colonne ID dans la varaible $presenceDunID
                }
            }

            //Ouvertre du du conteneur
            echo '<div class="infobox-container">';


            //Contenu
            foreach ($contenu as $ligne) {
                echo '<div class="infobox infobox-green" ';

                //On met un id
                if (!($presenceDunID == false)) {
                    echo 'id=' . $ligne[$presenceDunID] . ' ';
                }


                if ($form != NULL) {
                    echo 'onclick="modifier(';
                    echo $ligne[$presenceDunID];
                    echo ')" style="cursor:pointer" ';
                }

                echo '>' . "\n";
                $nom = '';
                if (empty($ligne['prenom1'])) {
                    $civ = $ligne['civilite'];
                    $nom .= ($civ == 1 ? 'Mme ' : '');
                    $nom .= ($civ == 2 ? 'Mlle ' : '');
                    $nom .= ($civ == 3 ? 'Mr ' : '');
                }
                $nom .= $ligne['nom1'] . ' ' . $ligne['prenom1'];

                if (!(empty($ligne['prenom2']))) {
                    $nom .= ' et ';
                    if ($ligne['nom1'] != $ligne['nom2']) {
                        $nom .= $ligne['nom2'];
                    }

                    $nom .= ' ' . $ligne['prenom2'];
                }

                $len = strlen(html_entity_decode($nom));

                if ($len < 20) {
                    echo "<div class='infobox-icon'>";
                    echo "<i class='ace-icon fa fa-user'></i>";
                    echo "</div>";
                }

                echo "<div class='infobox-data'>";

                echo substr($nom, 0, 24) . ($len > 24 ? "..." : "");


                echo "<div class = 'infobox-content'>";
                echo $ligne ['ville'];
                echo "</div>";
                echo "</div>";


                echo '</div>' . "\n";
            }
            echo '</div>';

            //Script qui permet de metre l'identifiant de la ligne à modifier en session codeigniter
            //La varaible en session aura le nom du 
            if ($form != NULL) {
                echo "  <script> 
                        function modifier(id){
                            $.post(
                                '../ajaxfonctionspersos/sessionpourform',
                                {'id':id,
                                 'form':'" . $form . "'},
                                function (){
                                    self.location.href='" . site_url($form) . "'                               }
                            );
                        }
                    </script>";
            }

        }
    }

    function printr($array)
    {
        static $indentation = '';
        static $array_key = '';
        $cst_indentation = '&nbsp;&nbsp;&nbsp;&nbsp;';

        echo $indentation . $array_key . '<b>array(</b><br />';
        reset($array);
        while (list($k, $v) = each($array)) {
            if (is_array($v)) {
                $indentation .= $cst_indentation;
                $array_key = '\'<i style="color: #334499 ;">' . addslashes(htmlspecialchars($k)) . '</i>\' => ';
                printr($v);
                $indentation = substr($indentation, 0, strlen($indentation) - strlen($cst_indentation));
            } else {
                echo $indentation . $cst_indentation . '\'<i style="color: #334499 ;">' .
                    addslashes(htmlspecialchars($k)) . '</i>\' => \'' . addslashes(htmlspecialchars($v)) . '\',<br />';
            }
        }
        echo $indentation . '<b>)</b>' . (($indentation === '') ? ';' : ',') . '<br />';
    }
}
