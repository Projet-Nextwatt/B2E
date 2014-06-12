<?php

/*
 * Classe Modèle pour la table Ensol, définir ici toutes les fonctionnalitées utilisant la table Article
 * CRUD de base mis en place.
 */

class Ensoleillement extends DataMapper
{

    /*
     * Variables correspondantes aux colonnes de la table.
     */
    var $IDEnsoleillement;
    var $Ville;
    var $Region;
    var $Latitude;
    var $Longitude;
    var $Marque;
    var $Radiation;
    var $Irradiationchauffe;
    var $HEPP;


    function __construct()
    {
        parent ::__construct();
    }

    function select_ensoleillement()
    {
        $result = $this->order_by('Region','asc')->get();
        $result= $result->all_to_array();
        return $result;
    }

    function ajouter_ensoleillement()
    {
        // Fonction d'ajout
    }

    function modifier_ensoleillement()
    {
        //Fonction de modification
    }

    function supprimer_ensoleillement()
    {
        $this->db->where('Nom', 'Nom');
        $this->db->delete('Article');
    }


}
