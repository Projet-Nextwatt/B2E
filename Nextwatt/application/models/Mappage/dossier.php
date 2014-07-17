<?php

/*
 * Classe Modèle pour la table Dossier, définir ici toutes les fonctionnalitées utilisant la table Dosier
 * CRUD de base mis en place.
 */

class Dossier extends DataMapper
{
    /*
     * Variables de relation (entre tables)
     */
//    var $has_one = array('Client');
//    var $has_many = array('Article');
//
//    var $table = "dossiers";
    /*
     * Variables correspondantes aux colonnes de la table.
     */
    var $ID_Dossier = "";
    var $ID_Client = "";
    var $FK_Etude = "";
    var $Titre = "";
    var $Montant = "";
    var $Date_Creation = "";
    var $Date_Modification = "";


    function __construct()
    {
        parent ::__construct();
    }

    /*
    function select_dossier()
    {
        //Fonction de selection
    }
    
    function ajouter_dossier()
    {
        // Fonction d'ajout
    }
    
    function modifier_dossier()
    {
        //Fonction de modification
    }
    
    function supprimer_dossier()
    {
        $this->db->where('ID_Dossier', 'ID_Dossier');
        $this->db->delete('Dossier');
    }*/

    public function select_idDossier()
    {
        $d = new Dossier();
        return $d->select_max('id')->get()->all_to_array('id');
    }

    public function add_Dossier($idClient){
        $d = new Dossier();
        $d->ID_Client = $idClient;
        $d->Date_Creation = date("Y-m-d");
        $d->Date_Modification = date("Y-m-d");
        $d->save();
    }
}

