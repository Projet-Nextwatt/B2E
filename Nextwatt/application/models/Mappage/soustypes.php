<?php
/*
 * Classe Modèle pour la table Soustype, définir ici toutes les fonctionnalitées utilisant la table Soustype
 * CRUD de base mis en place.
 */
class Soustype extends DataMapper {
    /*
     * Variables de relation (entre tables)
     */
    var $has_one = array ('Type');
    var $has_many = array ('Catalogue', 'Article');
    
    /*
     * Variables correspondantes aux colonnes de la table.
     */
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