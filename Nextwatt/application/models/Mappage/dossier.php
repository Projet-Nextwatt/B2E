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

    function __construct()
    {
        parent ::__construct();
    }


    function select_all_dossier()
    {
        $d = new Dossier();

        $dossiers = $d->where('actif', 1)->get();

        return $dossiers->all_to_array();
    }

    function select_dossier($id = NULL)
    {
        $d = new Dossier();

        $dossiers = $d->where('id', $id)->get();

        return $dossiers->all_to_array();
    }

    public function select_archive_dossier()
    {
        $d = new Dossier();

        $dossiers = $d->where('actif', 0)->get();

        return $dossiers->all_to_array();
    }

    function modifier_dossier()
    {
        //Fonction de modification
    }

    function supprimer_dossier()
    {
        $this->db->where('ID_Dossier', 'ID_Dossier');
        $this->db->delete('Dossier');
    }

    public function select_idDossier()
    {
        $d = new Dossier();
        return $d->select_max('id')->get()->all_to_array('id');
    }

    public function add_Dossier($idClient){
        $d = new Dossier();
        $d->client_id = $idClient;
        $d->Date_Creation = date("Y-m-d");
        $d->Date_Modification = date("Y-m-d");
        $d->actif = 1;
        $d->save();
    }

    public function archiver_dossier($idDossier)
    {
        $dossier = new Dossier();
        $dossier->where('id', $idDossier)->update('Actif', 0);
    }
}

