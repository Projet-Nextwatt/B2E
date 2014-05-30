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
    var $ID_User = "";
    var $Login = "";
    var $Password = "";
    var $ID_Categorie = "";
    var $Nom = "";
    var $Prenom = "";
    var $Email = "";
    var $Tel_1 = "";
    var $Tel_2 = "";
    var $Date_Ajout = "";
    var $Derniere_Connexion = "";
    var $Actif = "";
    
    
    function __construct() 
    {
        parent ::__construct();
    }
    
    function select_user()
    {
        //Fonction de selection
    }
    
    function ajouter_user()
    {
        // Fonction d'ajout
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