<?php

class User extends DataMapper {
    
    /*var $has_one = 
    var $has_many = */
    
    
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