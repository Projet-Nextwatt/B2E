<?php

class Categorie extends DataMapper {
    
    
    var $has_many = array('User');
    
    
    var $ID_Categorie = "";
    var $Categorie_Groupe = "";
    var $Nom_Categorie = "";
    var $Type_Catalogue = "";
    var $Droit_Sudo = "";
    var $Droit_Admin = "";
    var $Droit_Catalogue = "";
    
    
    function __construct() 
    {
        parent ::__construct();
    }
    
    function select_categorie()
    {
        //Fonction de selection
    }
    
    function ajouter_categorie()
    {
        // Fonction d'ajout
    }
    
    function modifier_categorie()
    {
        //Fonction de modification
    }
    
    function supprimer_categorie()
    {
        //Fonction de suppression
    }
    
    
    }