<?php
/*
 * Classe Modèle pour la table Catalogue, définir ici toutes les fonctionnalitées utilisant la table Catalogue
 * CRUD de base mis en place.
 */
class Catalogue extends DataMapper {
    /*
     * Variables de relation (entre tables)
     */
    var $has_one = array ('Soustype');
    var $has_many = array('Catalogue');
    
    /*
     * Variables correspondantes aux colonnes de la table.
     */
    var $ID_Catalogue = "";
    var $ID_SousType = "";
    var $Reference = "";
    var $Nom = "";
    var $FK_SousType = "";
    var $Marque = "";
    var $Puissance = "";
    var $Libelle_Mat = "";
    var $Libelle_Mat_SansMarque = "";
    var $Libelle_MO = "";
    var $Libelle_Garantie = "";
    var $Prix_MO = "";
    var $Prix_Mat_PlancherVAD = "";
    var $Prix_Mat_PlancherAC = "";
    var $Prix_Annonce_TTC_VAD = "";
    var $Prix_Annonce_TTC_AC = "";
    var $CEE_TTC = "";
    var $TVA_MO = "";
    var $TVA_Mat = "";
    var $Facturation = "";
    var $Type_Produit = "";
    var $Spec = "";
    var $Actif = "";
    var $Fiche_Tech = "";
    
    function __construct() 
    {
        parent ::__construct();
    }
    
    function select_article_catalogue()
    {
        //Fonction de selection
    }
    
    function ajouter_article_catalogue()
    {
        // Fonction d'ajout
    }
    
    function modifier_article_catalogue()
    {
        //Fonction de modification
    }
    
    function supprimer_article_catalogue()
    {
        $this->db->where('Nom', 'Nom');
        $this->db->delete('Catalogue');
    }
    
    
    
    
    }
