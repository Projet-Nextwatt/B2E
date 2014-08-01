<?php

/*
 * Classe Modèle pour la table Dossier, définir ici toutes les fonctionnalitées utilisant la table Dosier
 * CRUD de base mis en place.
 */

class Dossier extends DataMapper
{

    function __construct($id = NULL)
    {
        parent ::__construct($id);
    }

    //READ -------------------------

    function select_all_dossier()
    {
        $dossiers = $this->db->select('users.Identifiant,clients.nom1,dossiers.id,dossiers.actif,dossiers.titre,dossiers.montant')
            ->from('dossiers')
            ->join('clients', 'dossiers.client_id = clients.id', 'left')
            ->join('users', 'clients.user_id = users.id', 'left')
            ->order_by('users.Identifiant', 'asc')
            ->order_by('clients.nom1', 'asc')
            ->order_by('dossiers.Date_Creation', 'asc')
            ->where('dossiers.actif', '1')
            ->get()
            ->result_array();
        return $dossiers;

    }

    function select_dossier($id = NULL)
    {
        $d = new Dossier();
        $dossiers = $d->where('id', $id)->get();
        return $dossiers->all_to_array();


    }

    public function select_archive_dossier()
    {

        $dossiers = $this->db->select('users.Identifiant,clients.nom1,dossiers.id,dossiers.actif,dossiers.titre,dossiers.montant')
            ->from('dossiers')
            ->join('clients', 'dossiers.client_id = clients.id', 'left')
            ->join('users', 'clients.user_id = users.id', 'left')
            ->order_by('users.Identifiant', 'asc')
            ->order_by('clients.nom1', 'asc')
            ->order_by('dossiers.Date_Creation', 'asc')
            ->where('dossiers.actif', '0')
            ->get()
            ->result_array();
        return $dossiers;
    }

    public function select_idDossier()
    {
        $d = new Dossier();
        return $d->select_max('id')->get()->all_to_array('id');
    }


    public function select_dossier_by_client($idclient)
    {
        $d = new Dossier();
        $d->where('client_id', $idclient);
        $d->get();

        return $d->all_to_array();
    }

    public function add_Dossier($idClient)
    {
        $d = new Dossier();
        $d->client_id = $idClient;
        $d->Date_Creation = date("Y-m-d");
        $d->Date_Modification = date("Y-m-d");
        $d->actif = 1;
        $d->save();
    }

    function supprimer_dossier()
    {
        $this->db->where('ID_Dossier', 'ID_Dossier');
        $this->db->delete('Dossier');
    }

    function modifier_titre_dossier($id, $titre, $montant)
    {
        $dossier = new Dossier($id);
        $dossier->Titre = $titre;
        $dossier->Montant = $montant;
        $dossier->save();
    }

    function modifier_dossier()
    {
        //Fonction de modification
    }

    public function archiver_dossier($idDossier)
    {
        $dossier = new Dossier();
        $dossier->where('id', $idDossier)->update('Actif', 0);
    }

}
