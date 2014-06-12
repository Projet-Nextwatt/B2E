<?php
/*
 * Classe Modèle pour la table Hierarchie, définir ici toutes les fonctionnalitées utilisant la table Hierarchie
 * CRUD de base mis en place.
 */
class Hierarchie extends DataMapper 
{
    /*
     * Variables de relation (entre tables)
     */
    var $has_many = array('User');
    
    /*
     * Variables correspondantes aux colonnes de la table.
     */
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
    