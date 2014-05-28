<?php

class Soustype_model extends CI_Model {
    
    /*var $has_one = 
    var $has_many = */
    
    
    var $ID_SousType = "";
    var $ID_Type = "";
    var $Nom_SousType = "";
    var $Nom_Devis = "";
    var $Categorie_BouquetCI = "";
    var $Categorie_BouqetEcoPTZ = "";
    var $CI_Unitaire = "";
    
    
    function __construct() 
    {
        parent ::__construct();
    }
    
    function select_soustype()
    {
        //Fonction de selection
    }
    
    function ajouter_soustype()
    {
        // Fonction d'ajout
    }
    
    function modifier_soustype()
    {
        //Fonction de modification
    }
    
    function supprimer_soustype()
    {
        //Fonction de suppression
    }
    
    
    }