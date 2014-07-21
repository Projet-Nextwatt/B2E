<?php

/*
 * Classe Modèle pour la table Article, définir ici toutes les fonctionnalitées utilisant la table Article
 */

class Article extends DataMapper
{
    /*
     * Variables de relation (entre tables)
     */
    var $has_one = array("article", "dossier", "soustype");
    var $has_many = array("article");


    function __construct()
    {
        parent ::__construct();
    }

    function select_article()
    {
        //Fonction de selection
    }

    function ajouter_article($produit)
    {
        $newcatalogue = new Catalogue();
        $newcatalogue->id = $produit['id'];
        $newcatalogue->ID_SousType = $produit['ID_SousType'];
        $newcatalogue->ID_Dossier = $produit['ID_Dossier'];
        $newcatalogue->Reference = $produit['Reference'];
        $newcatalogue->Nom = $produit['Nom'];
        $newcatalogue->Marque = $produit['Marque'];
        $newcatalogue->Puissance = $produit['Puissance'];
        $newcatalogue->Libelle_Mat = $produit['Libelle_Mat'];
        $newcatalogue->Libelle_MO = $produit['Libelle_MO'];
        $newcatalogue->Libelle_Garantie = $produit['Libelle_Garantie'];
        $newcatalogue->Prix_MO = $produit['Prix_MO'];
        $newcatalogue->Prix_Mat_Plancher = $produit['Prix_Mat_Plancher'];
        $newcatalogue->Prix_Annonce_TTC = $produit['Prix_Annonce_TTC'];
        $newcatalogue->CEE_TTC = $produit['CEE_TTC'];
        $newcatalogue->TVA_MO = $produit['TVA_MO'];
        $newcatalogue->TVA_Mat = $produit['TVA_Mat'];
        $newcatalogue->Facturation = $produit['Facturation'];
        $newcatalogue->Type_Produit = $produit['Type_Produit'];
        $newcatalogue->Spec = $produit['Spec'];
        $newcatalogue->Actif = $produit['Actif'];


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
