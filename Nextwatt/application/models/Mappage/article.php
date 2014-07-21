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
        $newproduit = array(
            'id' => $produit[0]['id'],
            'ID_SousType' => $produit[0]['ID_SousType'],
            'ID_Dossier' => $produit['ID_Dossier'],
            'Reference' => $produit[0]['Reference'],
            'Nom' => $produit[0]['Nom'],
            'Marque' => $produit[0]['Marque'],
            'Puissance' => $produit[0]['Puissance'],
            'Libelle_Mat' => $produit[0]['Libelle_Mat'],
            'Libelle_MO' => $produit[0]['Libelle_MO'],
            'Libelle_Garantie' => $produit[0]['Libelle_Garantie'],
            'Prix_MO' => $produit[0]['Prix_MO'],
            'Prix_Mat_Plancher' => $produit[0]['Prix_Mat_Plancher'],
            'CEE_TTC' => $produit[0]['CEE_TTC'],
            'Prix_Annonce_TTC' => $produit[0]['Prix_Annonce_TTC'],
            'TVA_MO' => $produit[0]['TVA_MO'],
            'TVA_Mat' => $produit[0]['TVA_Mat'],
            'Facturation' => $produit[0]['Facturation'],
            'Type_Produit' => $produit[0]['Type_Produit'],
            'Spec' => $produit[0]['Spec'],
            'actif' => $produit[0]['Actif'],
        );
        $this->db->insert('articles', $newproduit);
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
