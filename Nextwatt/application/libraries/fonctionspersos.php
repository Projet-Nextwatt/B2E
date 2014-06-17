<?php
class Fonctionspersos
{
    public function creerTableau(array $entetes, array $contenu)
    {
        if ($contenu == NULL OR (isset($contenu[0]) AND $contenu[0] == '')) {
            echo '<p>Attention: Aucune donn&eacutees &agrave; afficher dans le tableau.</p>';
        } else {
            echo '<table>';

            //En-tete
            echo '<tr>' . "\n";
            foreach ($entetes as $entete) {
                echo '<th>' . $entete . '</th>' . "\n";
            }
            echo '</tr>' . "\n";

            //Contenu
            foreach ($contenu as $ligne) {
                echo '<tr>' . "\n";
                foreach ($ligne as $cellule) {
                    echo '<td>' . $cellule . '</td>' . "\n";
                }
                echo '</tr>' . "\n";
            }

            echo '</table>';
        }
    }
}


