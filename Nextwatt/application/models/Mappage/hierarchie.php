<?php

class Hierarchie extends DataMapper 
{
    
    var $has_many = array('User');
    
    
    var $ID_Hierarchie = "";
    var $FK_Chef = "";
    
    
    function __construct() 
    {
        parent ::__construct();
    }
    
    function select_hierarchie()
    {
        //Fonction de selection
    }
    
    function ajouter_hierarchie()
    {
        // Fonction d'ajout
    }
    
    function modifier_hierarchie()
    {
        //Fonction de modification
    }
    
    function supprimer_hierarchie()
    {
        //Fonction de suppression
    }
    
}
    