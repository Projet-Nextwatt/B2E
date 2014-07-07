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
    var $has_many = array('Dossiers');

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
    var $dateajout = "";


    function __construct($id = NULL)
    {
        parent ::__construct($id);
    }

    function select_client($id = NULL)
    {
        $clients = new Client();
        if ($id != NULL) {
            $clients->where('id', $id);
            $clients->get();
            $retour = $clients->all_to_array();
            return $retour['0'];
        } else {
            $clients->get();
            return $clients->all_to_array();;
        }
    }

    function select_client_tableau($id = NULL)
    {
        $clients = new Client();
        if ($id != NULL) {
            $clients->where('id', $id);
            $clients->get();
            $retour = $clients->all_to_array();
            return $retour['0'];
        } else {
            $clients->get();
            $champs = array('id', 'nom1', 'prenom1', 'email', 'tel1', 'tel2', 'user_id');
            $retour = $clients->all_to_array($champs);
            return $retour;
        }
    }


    function ajouter_client($data)
    {
        $today = date("Y-m-d");

        $client = array(
            'civilite' => $data['civilite'],
            'nom1' => $data['nom1'],
            'prenom1' => $data['prenom1'],
            'nom2' => $data['nom2'],
            'prenom2' => $data['prenom2'],
            'adresse' => $data['adresse'],
            'codepostal' => $data['codepostal'],
            'ville' => $data['ville'],
            'tel1' => $data['tel1'],
            'tel2' => $data['tel2'],
            'email' => $data['email'],
            'user_id' => $data['responsable'],
            'dateajout' => $today,
        );


        $this->db->insert('clients', $client);
    }

    function modifier_client($data)
    {
        $id = $data['id'];
        unset($data['id']);

        $client = new Client();
        $client->where('id', $id)->get();
        //Appliquer les datas

        foreach ($data as $variable => $valeur) {
            $client->$variable = $valeur;
        }
        return $client->save();

    }

    function supprimer_client($id)
    {

        $client = new Client();
        $client->where('id', $id)->get();

        $client->delete();
    }

}

