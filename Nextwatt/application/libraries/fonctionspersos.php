<?php

class Fonctionspersos {

    public function creerTableau(array $contenu, array $entetes = NULL) {
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
            $id=0;
            echo '<div class="table-responsive">';
            echo '<table id="sample-table-1" class="table table-striped table-bordered table-hover">';

            //En-tete
            echo '<thead>' . "\n";
            echo '<tr>' . "\n";
            foreach ($entetes as $entete) {
                echo '<th>' . $entete . '</th>' . "\n";
            }
            echo '</tr>' . "\n";
            echo '</thead>' . "\n";

            //Contenu
            echo '<tbody>' . "\n";
            foreach ($contenu as $ligne) {
                echo '<tr id=';
                if (!($presenceDunID==false)){
                    echo $ligne[$presenceDunID];
                } else {
                    echo $id;
                }
                $id++;
                
                echo '>' . "\n";
                foreach ($ligne as $cellule) {
                    echo '<td>' . $cellule . '</td>' . "\n";
                }
                echo '</tr>' . "\n";
            }
            echo '</tbody>' . "\n";
            echo '</table>';
            echo '</div>';
        }
    }

}
