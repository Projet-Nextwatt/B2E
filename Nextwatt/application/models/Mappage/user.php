<?php
/*
 * Classe Modèle pour la table User, définir ici toutes les fonctionnalitées utilisant la table USER
 * CRUD de base mis en place.
 */
class User extends DataMapper {
    /*
     * Variables de relation (entre tables)
     */
    var $has_one = array('Categorie');
    var $has_many = array('Hierarchie','Client');
    
    /*
     * Variables correspondantes aux colonnes de la table.
     */
    
    /*
    var $Identifiant = "";
    var $mdp = "";
    var $ID_Categorie = "";
    var $Nom = "";
    var $Prenom = "";
    var $Email = "";
    var $Tel = "";
    var $Date_Ajout = "";
    var $Derniere_Connexion = "";
    var $Actif = "";
    */
    
    function __construct() 
    {
        parent ::__construct();
    }
    
    function select_user($id  =NULL)
    {
        $users = new User();
        if ($id != NULL) {
            $users->where('ID_User', $id);
            $users->get();
            $retour=$users->all_to_array();
            return $retour['0'];
        } else {
            $users->get();
            return $users->all_to_array();
        }
    }
    
    function ajouter_user($data)
    {
        $user = array(
            'Login' => $data['Identifiant'],
            'Password' => $data['mdp'],
            'ID_Categorie' => $data['categorie'],
            'Prenom' => $data['prenom'],
            'Nom' => $data['nom'],
            'Email' => $data['email'],
            'Tel' => $data['tel'],
        );

        $this->db->insert('users', $user);
    }
    
    function modifier_user()
    {
        //Fonction de modification
    }
    
    function supprimer_user()
    {
        $this->db->where('Login', '');
        $this->db->delete('Article');
    }
    
    
    }