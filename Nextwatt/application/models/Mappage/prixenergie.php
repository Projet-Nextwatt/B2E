<?php

/*
 * Classe Modèle pour la table PrixEnergie, définir ici toutes les fonctionnalitées utilisant la table PrixEnergie
 * CRUD de base mis en place.
 */

class Prixenergie extends DataMapper {
    /*
     * Variables correspondantes aux colonnes de la table.
     */

    var $ID_PrixEnergie = "";
    var $Energie = "";
    var $Prix = "";
    var $Inflation = "";
    var $CO2 = "";
    var $Abonnement = "";

    function __construct() {
        parent ::__construct();
    }

    function __toString() {
        return "<p>" .
                "ID->" . $this->ID_PrixEnergie . "<br/>" .
                "Energie->" . $this->Energie . "<br/>" .
                "Prix->" . $this->Prix . "<br/>" .
                "Inlfation->" . $this->Inflation . "<br/>" .
                "CO2->" . $this->CO2 . "<br/>" .
                "Abonement->" . $this->Abonnement . "<br/>" .
                "</p>";
    }

    function select_prixenergie() {
        $energies = new Prixenergie();
        $energies->get();
        return $energies->all_to_array();
    }

    function ajouter_prixenergie($data) {

        $energie = new Prixenergie();
        foreach ($data as $variable => $valeur) {
            //if (isset($Energie->$variable)) { // Ce test ne fonctionne pas, mais ne faudrait il pas passer par des set?? ***************************
                $energie->$variable = $valeur;
            //}
        }
        return $energie->save();
        
        /*
              $Energie->
              Energie = $_POST['Energie'];
              $Energie->Prix = $_POST['Prix'];
              $Energie->Inflation = $_POST['Inflatiosn'];
              $Energie->Abonnement = $_POST['Abonnement'];
              $Energie->CO2 = $_POST['CO2'];
             */
    }

    function modifier_prixenergie() {
        //Fonction de modification
    }

    function supprimer_prixenergie() {
        //Fonction de suppression
    }

}
