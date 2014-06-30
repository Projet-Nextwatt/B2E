<?php
/*
 * Classe Modèle pour la table Type, définir ici toutes les fonctionnalitées utilisant la table Type
 * CRUD de base mis en place.
 */
class Type extends DataMapper {
    /*
     * Variables de relation (entre tables)
     */
    var $has_many = array ('Soustype');
    
    /*
     * Variables correspondantes aux colonnes de la table.
     */
    var $ID_Type = "";
    var $Nom_Type = "";
    var $Code_Type = "";
    
    
    function __construct() 
    {
        parent ::__construct();
    }
    
    function select_type()
    {
        //Fonction de selection
    }
    
    function ajouter_type()
    {
        // Fonction d'ajout
    }
    
    function modifier_type()
    {
        //Fonction de modification
    }
    
    function supprimer_type()
    {
        //Fonction de suppression
    }
    
    
    }
