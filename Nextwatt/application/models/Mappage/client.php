<?php

/*
 * Classe Modèle pour la table Client, définir ici toutes les fonctionnalitées utilisant la table Client
 * CRUD de base mis en place.
 */

class Client extends DataMapper
{
    /*
     * Variables de relation (entre tables)
     */
    var $has_one = array('User');
    var $has_many = array('Dossier');

    /*
     * Variables correspondantes aux colonnes de la table.
     */
    var $ID_Client = "";
    var $ID_User = "";
    var $FK_User = "";
    var $civilite = "";
    var $nom1 = "";
    var $prenom1 = "";
    var $nom2 = "";
    var $prenom2 = "";
    var $adresse = "";
    var $codepostal = "";
    var $ville = "";
    var $tel1 = "";
    var $tel2 = "";
    var $email = "";
    var $responsable = "";
    var $Date_Ajout = "";


    function __construct()
    {
        parent ::__construct();
    }

    function select_client($id = NULL)
    {
        $clients = new Client();
        if ($id != NULL) {
            $clients->where('ID_Client', $id);
            $clients->select();
            $retour = $clients->all_to_array();
            return $retour['0'];
        } else {
            $clients->get();
            return $clients->all_to_array();
        }
    }

    function ajouter_client($data)
    {
        $client = new Client();
//        $client->Ville = 'BBA';

        foreach ($data as $variable => $valeur) {
            //if (isset($Energie->$variable)) { // Ce test ne fonctionne pas, mais ne faudrait il pas passer par des set?? ***************************
            $client->$variable = $valeur;
            //}
        }
        return $client->save();
    }

    function modifier_client()
    {
        //Fonction de modification
    }

    function supprimer_client()
    {
        $this->db->where('Nom', 'Nom');
        $this->db->delete('Client');
    }

}

