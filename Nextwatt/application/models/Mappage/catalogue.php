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
//    var $has_one = array('Soustype');
//    var $has_many = array('Catalogue');

    /*
     * Variables correspondantes aux colonnes de la table.
     */
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
    var $Prix_Mat_Plancher;
    var $Prix_Annonce_TTC;
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
        foreach ($refbddtest as $element) {
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

            $i = 0;
            foreach ($element as $sub_element) {
                $rslt[$element['Reference']][$i] = $sub_element;
                $i++;
            }

        }
        return $rslt;
    }

    public function get_full_bdd()
    {
        $bdd = new Catalogue();

        $bdd->select('Reference, Nom, Marque, Puissance, Prix_Annonce_TTC');
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
        $compteur=0;
        foreach ($fichier as $produit)

        {
            $newcatalogue = new Catalogue();

            $newcatalogue->where('Reference', $produit[0])->get();
            $newcatalogue->Reference = "$produit[0]";
            $newcatalogue->Nom = "$produit[1]";
            $newcatalogue->Marque = "$produit[2]";
            $newcatalogue->Puissance = "$produit[3]";
            $newcatalogue->Libelle_Mat = "$produit[4]";
            $newcatalogue->Libelle_Mat_SansMarque = "$produit[5]";
            $newcatalogue->Libelle_MO = "$produit[6]";
            $newcatalogue->Libelle_Garantie = "$produit[7]";
            $newcatalogue->Prix_MO = "$produit[8]";
            $newcatalogue->Prix_Mat_Plancher = "$produit[9]";
            $newcatalogue->Prix_Annonce_TTC = "$produit[10]";
            $newcatalogue->CEE_TTC = "$produit[11]";
            $newcatalogue->TVA_MO = "$produit[12]";
            $newcatalogue->TVA_Mat = "$produit[13]";
            $newcatalogue->Facturation = "$produit[14]";
            $newcatalogue->Type_Produit = "$produit[15]";
            $newcatalogue->Spec = "$produit[16]";
            $newcatalogue->Actif = 1;
            $newcatalogue->Fiche_Tech = "$produit[17]";
            $newcatalogue->Note = "$produit[18]";

            $newcatalogue->save();

            $compteur++;
        }

        return $compteur;
    }

    function supprimer($id)
    {

        $obj = new Catalogue();

        $obj->where('Reference', $id);
        $obj->get();

        $obj->delete();

        return TRUE;
    }

}
