<?php

/*
 * Classe Modèle pour la table Client, définir ici toutes les fonctionnalitées utilisant la table Client
 * CRUD de base mis en place.
 */

class Client extends DataMapper
{
    /*
     * Variables de relation (entre tables)
//     */
//    var $has_one = array('User');
//    var $has_many = array('Dossier');

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
            return $clients->all_to_array();
        }
    }

    /*function select_client_tableau($id = NULL)
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
    }*/

    function list_client($actif = NULL, $selectcolonne = NULL)
    {
        // $selectcolonnne = array('col 1','col2',...);
        $clients = new Client();
        if ($actif == TRUE) {
            $clients->where('Actif', 1);
        } else if ($actif == FALSE) {
            $clients->where('Actif', 0);
        }
        $clients->order_by('dateajout','DESC');
        $clients->get();

        return $clients->all_to_array($selectcolonne);
    }

    function ajouter_client($data)
    {
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
            'user_id' => $data['user_id'],
            'dateajout' => date("Y-m-d"),
            'actif' => 1,
        );
        $this->db->insert('clients', $client);
        return mysql_insert_id();
    }

    public function archiverclient($data)
    {

        $id = $data;
        $client = new Client();
        $client->where('id', $id)->update('actif', 0);;
    }

    public function activerclient($data)
    {

        $id = $data;
        $client = new Client();
        $client->where('id', $id)->update('actif', 1);;
    }


    function modifier_client($data)
    {
        $id = $data['id'];
        unset($data['id']);
        $client = new Client();
        $client->where('id', $id)->get();
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

    function link_ClientUser($idUser, $idClient)
    {
        $c = new Client();
        return $c->where('id', $idClient)->update('user_id', $idUser);

    }

    function get_InfoUser($id)
    {
        $c = new Client();
        return $c->where('id',$id)->get()->all_to_array();
    }
}

