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


    function __construct()
    {
        parent ::__construct();
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
//            echo('var dump du clients objet');
//            var_dump($clients);

            $champs = array('id', 'nom1', 'prenom1', 'email', 'tel1', 'tel2', 'responsable');
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
            'responsable' => $data['responsable'],
            'dateajout' => $today
        );



        //if (isset($Energie->$variable)) { // Ce test ne fonctionne pas, mais ne faudrait il pas passer par des set?? ***************************

//        var_dump($valeur);
        //}
//        var_dump($client);
//        $client->all_to_array();

        $this->db->insert('clients', $client);
//        return $client->save();
    }

    function modifier_client()
    {
        //Fonction de modification
    }

    function supprimer_client($id)
    {
        $client = new Client();
        $client->where('id', $id)->get();

        $client->delete();
    }

}

