<?php

class Article extends DataMapper {
    
    var $has_one = array("article", "dossier", "soustype");
    var $has_many = array("article");
    
    var $ID_Article = "";
    var $ID_Dossier = "";
    var $TB_ID_Article = "";
    var $ID_SousType = "";
    var $FK_Dossier = "";
    var $Marque = "";
    var $Puissance = "";
    var $Libelle_Mat = "";
    var $Libelle_Mat_SansMarque = "";
    var $Libelle_MO = "";
    var $Libelle_Garantie = "";
    var $Prix_MO = "";
    var $Prix_Mat_Plancher = "";
    var $Prix_Annonce_TTC = "";
    var $CEE_TTC = "";
    var $TVA_MO = "";
    var $TVA_Mat = "";
    var $Facturation = "";
    var $Type_Produit = "";
    var $Remise = "";
    var $Quantité = "";
    var $Spec = "";
    
    
    function __construct() 
    {
        parent ::__construct();
    }
    
    function select_article()
    {
        //Fonction de selection
    }
    
    function ajouter_article()
    {
        // Fonction d'ajout
    }
    
    function modifier_article()
    {
        //Fonction de modification
    }
    
    function supprimer_article()
    {
        $this->db->where('Nom', 'Nom');
        $this->db->delete('Article');
    }
    
    
    
    
    }
