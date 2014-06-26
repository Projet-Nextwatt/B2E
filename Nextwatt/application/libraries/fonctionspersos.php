<?php

class Fonctionspersos
{


    public function creerTableau(array $contenu,
                                 array $entetes = NULL,
                                 $form = NULL,
                                 $sup = NULL,
                                 $checkbox = false)
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
         *       et crée le bouton d'envoi au formualaire
         * ----- et stocke l'id de la ligne à modifier dans 
         *       SESSION["adresse du formalaire"],
         *       les session sont celle de code ignter
         * 
         * ||Attend l'adresse du controleur de suppression
         *       et creer un bouton de suppression
         *       avec pop-up de confirmation
         * 
         * ||Attend juste un TRUE
         *       permet de converir les 1 et 0 en chebox validée
         *       ou en rien du tout
         */


        if ($contenu == NULL OR (isset($contenu[0]) AND $contenu[0] == '')) {
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
                    echo 'id=' . $ligne[$presenceDunID];
                }

                echo '>' . "\n";
                foreach ($ligne as $cellule) {
                    
                    //Modification du texte si c'est l'option checkbox est active
                    if ($checkbox==true){
                        if ($cellule == '1'){
                            //$cellule = '<i class="ace-icon glyphicon glyphicon-ok"></i>';
                            $cellule = '<div class="align-center"><i class="fa fa-check"></i></div>';
                        } elseif ($cellule=='0') {
                            $cellule = '';
                        }
                    }
                    
                    
                    
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
    
    public function creerDropdown(array $donnees, $selected, $nom, $class=NULL){
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
        
        
        echo '<select name="'.$nom.'" id="'.$nom.'" class="'.$class.'">';
        foreach ($donneestriees as $label => $groupe){
            echo '<optgroup label="'.$label.'">';
            foreach ($groupe as $categorie){
                echo '<option value="'.$categorie['value']
                     .'" '.$categorie['selected']
                     .'>'.$categorie['texte'].'</option>';
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
                $ligneFichier = explode('_', //Pour d�composer la ligne en tableau
                    //convertCarSpe

                    htmlentities( //Pour convertir les � en &eacute;
                        addslashes( //Pour eviteer les probl�me de '
                            mb_convert_encoding( //Pour convertir le ANSII vers UTF-8
                                fgets(
                                    $fichierCatalogue), 'UTF-8', 'ASCII'))));
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

    public function set_entete()
    {
        $entete = array('Référence', 'Nom', 'Marque', 'Puissance', 'Libellé Mat', 'Libellé Mat sans marque', 'Libellé MO', 'Libellé Garantie', 'Prix MO', 'Prix Mat plancher', 'Prix annonce TTC', 'CEE TTC', 'TVA_MO', 'TVA Mat', 'Facturation', 'Type', 'Spec', 'Fiche Technique', 'Note');
        return $entete;
    }

//    public function prepfichier($fichier)
//    {
//        foreach($fichier as $produit)
//        {
//            foreach($produit as $line)
//            {
//                $newfichier =  htmlspecialchars_decode($line,ENT_NOQUOTES);
//            }
//        }
//        var_dump($newfichier);
//    }
}
