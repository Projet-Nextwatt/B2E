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
            $users->where('id', $id);
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
            'Identifiant' => $data['Identifiant'],
            'mdp' => $data['mdp'],
            'FK_Categorie' => $data['Categories'],
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'tel' => $data['tel'],
            'Date_Ajout' => date("Y-m-j H:i:s"),
            'Actif' => 1,
        );

        if ($this->db->insert('users', $user)){
            return TRUE;
        }
        else
        {
            echo '<p>' . $user->error->string . '</p>';
            return FALSE;
        }
        
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