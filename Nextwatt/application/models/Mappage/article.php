<?php

/*
 * Classe Modèle pour la table Article, définir ici toutes les fonctionnalitées utilisant la table Article
 */

class Article extends DataMapper {
    /*
     * Variables de relation (entre tables)
     */

    var $has_one = array("article", "dossier", "soustype");

    function __construct() {
        parent ::__construct();
    }

    function select_article() {
        //Fonction de selection
    }

    function list_article_dossier($iddossier) {
        $articles = new Article();
        $articles->where('dossier_id', $iddossier);
        $articles->get();
        return $articles->all_to_array();
    }

    public function archiver_article($idDossier)
    {
        $article = new Article();
        $article->where('dossier_id', $idDossier);
        $article->update('Actif', 0);
    }

    function ajouter_article($produit) {
        $newproduit = array(
            'soustype_id' => $produit['soustype_id'],
            'dossier_id' => $produit['dossier_id'],
            'Reference' => $produit['Reference'],
            'Nom' => $produit['Nom'],
            'Marque' => $produit['Marque'],
            'Puissance' => $produit['Puissance'],
            'Libelle_Mat' => $produit['Libelle_Mat'],
            'Libelle_MO' => $produit['Libelle_MO'],
            'Libelle_Garantie' => $produit['Libelle_Garantie'],
            'Prix_MO' => $produit['Prix_MO'],
            'Prix_Mat_Plancher' => $produit['Prix_Mat_Plancher'],
            'CEE_TTC' => $produit['CEE_TTC'],
            'Prix_Annonce_TTC' => $produit['Prix_Annonce_TTC'],
            'TVA_MO' => $produit['TVA_MO'],
            'TVA_Mat' => $produit['TVA_Mat'],
            'Facturation' => $produit['Facturation'],
            'Type_Produit' => $produit['Type_Produit'],
            'Spec' => $produit['Spec'],
            'actif' => $produit['Actif'],
            'Quantite'=>1,
        );
        $this->db->insert('articles', $newproduit);
    }

    function modifier_article() {
        //Fonction de modification
    }

    function supprimer_article() {
        $this->db->where('Nom', 'Nom');
        $this->db->delete('Article');
        //Et aussi les options
    }

}
