<?php

class Dossier_model extends DataMapper {
    
    /*var $has_one = 
    var $has_many = */
    
    var $table ="dossier";
    
    var $ID_Dossier = "";
    var $ID_Client = "";
    var $FK_Etude = "";
    var $Titre = "";
    var $Montant = "";
    var $Date_Creation = "";
    var $Date_Modification = "";
    
    
    function __construct() 
    {
        parent ::__construct();
    }
    /*
    function select_dossier()
    {
        //Fonction de selection
    }
    
    function ajouter_dossier()
    {
        // Fonction d'ajout
    }
    
    function modifier_dossier()
    {
        //Fonction de modification
    }
    
    function supprimer_dossier()
    {
        $this->db->where('ID_Dossier', 'ID_Dossier');
        $this->db->delete('Dossier');
    }*/
    }

