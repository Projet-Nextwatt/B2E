<?php
/*
 * Classe Modèle pour la table PrixEnergie, définir ici toutes les fonctionnalitées utilisant la table PrixEnergie
 * CRUD de base mis en place.
 */
class Prixenergie extends DataMapper {
     /*
     * Variables correspondantes aux colonnes de la table.
     */
    var $ID_PrixEnergie = "";
    var $Energie = "";
    var $Prix = "";
    var $Inflation = "";
    var $CO2 = "";
    var $Abonnement = "";
    
    
    function __construct() 
    {
        parent ::__construct();
    }
    
    function select_prixenergie()
    {
        //Fonction de selection
    }
    
    function ajouter_prixenergie()
    {
        // Fonction d'ajout
    }
    
    function modifier_prixenergie()
    {
        //Fonction de modification
    }
    
    function supprimer_prixenergie()
    {
        //Fonction de suppression
    }
    
    
    }

