<?php

class Dossier_model extends CI_Model {
    
    /*var $has_one = 
    var $has_many = */
    
    
    var $ID_Dossier = "";
    var $FK_Client = "";
    var $FK_Client = "";
    var $Titre = "";
    var $Montant = "";
    var $Date_Creation = "";
    var $Date_Modification = "";
    
    
    function __construct() 
    {
        parent ::__construct();
    }
    
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
        //Fonction de suppression
    }
    
    
    
    
    }

