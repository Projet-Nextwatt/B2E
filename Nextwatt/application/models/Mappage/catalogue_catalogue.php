<?php

/*
 * Classe Modèle pour la table Catalogue_Catalogue, définir ici toutes les fonctionnalitées utilisant la table Catalogue
 */

class Catalogue_catalogue extends DataMapper
{
    function __construct($id=null)
    {
        parent ::__construct($id);
    }

    public function charger_liens($nom_prod = null)
    {
        $option = new Catalogue_catalogue();
        $option->get();
        return $option->all_to_array();
    }
    
        public function select_option($nom_prod = null)
    {
        $option = new Catalogue_catalogue();

        $option->select('op_ref')
                ->where('produit_ref', $nom_prod)
                ->get();

        return $option->all_to_array();
    }
}
