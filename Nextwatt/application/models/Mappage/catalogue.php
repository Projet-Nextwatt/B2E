<?php
/*
 * Classe Modèle pour la table Catalogue, définir ici toutes les fonctionnalitées utilisant la table Catalogue
 * CRUD de base mis en place.
 */
class Catalogue extends DataMapper
{
    /*
     * Variables de relation (entre tables)
     */
    var $has_one = array ('Soustype');
    var $has_many = array('Catalogue');
    
    /*
     * Variables correspondantes aux colonnes de la table.
     */
    var $ID_Catalogue;
    var $ID_SousType;
    var $Reference;
    var $Nom;
    var $FK_SousType;
    var $Marque;
    var $Puissance;
    var $Libelle_Mat;
    var $Libelle_Mat_SansMarque;
    var $Libelle_MO;
    var $Libelle_Garantie;
    var $Prix_MO;
    var $Prix_Mat_PlancherVAD;
    var $Prix_Mat_PlancherAC;
    var $Prix_Annonce_TTC_VAD;
    var $Prix_Annonce_TTC_AC;
    var $CEE_TTC;
    var $TVA_MO;
    var $TVA_Mat;
    var $Facturation;
    var $Type_Produit;
    var $Spec;
    var $Actif;
    var $Fiche_Tech;
    var $Note;
    
    function __construct()
    {
        parent ::__construct();
    }

    public function get_ref_bdd()
    {
        $refbddtest = new Catalogue();

        $refbddtest->select('Reference');
        $refbddtest->get();

        $refbddtest = $refbddtest->all_to_array();

        /************************************************  GROS TEST DE LA MORT QUI TUE !!!  ***************************************/

        $rslt = array();
        foreach($refbddtest as $element)
        {
            unset ($element['ID_Catalogue']);
            unset ($element['ID_SousType']);
            unset ($element['Nom']);
            unset ($element['Marque']);
            unset ($element['Puissance']);
            unset ($element['Libelle_Mat']);
            unset ($element['Libelle_Mat_SansMarque']);
            unset ($element['Libelle_MO']);
            unset ($element['Libelle_Garantie']);
            unset ($element['Prix_MO']);
            unset ($element['Prix_Mat_Plancher']);
            unset ($element['Prix_Annonce_TTC']);
            unset ($element['CEE_TTC']);
            unset ($element['TVA_MO']);
            unset ($element['TVA_Mat']);
            unset ($element['Facturation']);
            unset ($element['Type_Produit']);
            unset ($element['Spec']);
            unset ($element['Actif']);
            unset ($element['Fiche_Tech']);
            unset ($element['Note']);

            $i=0;
            foreach ($element as $sub_element)
            {
                $rslt[$element['Reference']][$i]=$sub_element;
                $i++;
            }

        }
        return $rslt;
    }

    public function get_full_bdd()
    {
        $bdd = new Catalogue();

        $bdd->select('Reference, Nom, Marque, Puissance, Libelle_Mat, Libelle_Mat_SansMarque, Libelle_MO, Libelle_Garantie,
        Prix_MO, Prix_Mat_Plancher, Prix_Annonce_TTC, CEE_TTC, TVA_MO, TVA_Mat, Facturation, Type_Produit, Spec, Fiche_Tech, Note');
        $bdd->get();

        $bdd = $bdd->all_to_array();

        return $bdd;
    }

    function select_article_catalogue()
    {
//        $catalogues = new Catalogue();
//        $catalogue = new Catalogue();
//
//        $retour_catalogue = array();
//        $retour_catalogue['catalogues'] = $catalogues;
//
//
//        $catalogue->get();
//        $catalogues->get();
//
//        return retour_catalogue;
    }

    function updatecatalogue($fichier)
    {
        foreach($fichier as $produit)
        {
            foreach($produit as $line)
            {
                $newfichier =  htmlspecialchars_decode($line,ENT_NOQUOTES);
            }
        }
    }
}
