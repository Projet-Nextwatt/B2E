<?php

class client_model extends CI_Model {
    
    /*var $has_one = 
    var $has_many = */
    
    
    var $ID_Client = "";
    var $ID_User = "";
    var $FK_User = "";
    var $Nom = "";
    var $Prenom = "";
    var $Adresse = "";
    var $Code_Postale = "";
    var $Ville = "";
    var $Tel_1 = "";
    var $Tel_2 = "";
    var $Email = "";
    var $Date_Ajout = "";
    
    
    function __construct() 
    {
        parent ::__construct();
    }
    
    function select_client()
    {
        //Fonction de selection
    }
    
    function ajouter_client()
    {
        // Fonction d'ajout
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

