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
    var $ID_SousType;
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

        $refbddtest->select('Reference,id, Nom, soustype_id');
        $refbddtest->order_by('soustype_id');
        $refbddtest->get();

        $refbddtest = $refbddtest->all_to_array(array('Reference','id', 'Nom', 'soustype_id'));
        $rslt = array();
        foreach ($refbddtest as $element) {
            $rslt[$element['Reference']]['id'] = $element['id'];
            $rslt[$element['Reference']]['Nom'] = $element['Nom'];
            $rslt[$element['Reference']]['soustype_id'] = $element['soustype_id'];
        }
        return $rslt;
    }

    public function get_full_bdd()
    {
        $bdd = new Catalogue();

        $bdd->get();

        $bdd = $bdd->all_to_array();

        return $bdd;
    }

    public function get_catalogue_pour_modif()
    {
        $catalogue = new Catalogue();
        $catalogue->get();
        $catalogue = $catalogue->all_to_array();

        $rslt = array();
        foreach ($catalogue as $element) {
            unset ($element['id']);
            unset ($element['soustype_id']);
            unset ($element['Actif']);

            $i = 0;
            foreach ($element as $sub_element) {
                $rslt[$element['Reference']][$i] = $sub_element;
                $i++;
            }
        }
        return $rslt;
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
        $compteur = 0;
        foreach ($fichier as $produit) {
            $newcatalogue = new Catalogue();
            $newcatalogue->where('Reference', $produit[0])->get();
            (isset($produit[0]) ? $newcatalogue->Reference = $produit[0] : '');
            (isset($produit[1]) ? $newcatalogue->Nom = $produit[1] : '');
            (isset($produit[2]) ? $newcatalogue->Marque = $produit[2] : '');
            (isset($produit[3]) ? $newcatalogue->Puissance = $produit[3] : '');
            (isset($produit[4]) ? $newcatalogue->Libelle_Mat = $produit[4] : '');
            (isset($produit[5]) ? $newcatalogue->Libelle_Mat_SansMarque = $produit[5] : '');
            (isset($produit[6]) ? $newcatalogue->Libelle_MO = $produit[6] : '');
            (isset($produit[7]) ? $newcatalogue->Libelle_Garantie = $produit[7] : '');
            (isset($produit[8]) ? $newcatalogue->Prix_MO = $produit[8] : '');
            (isset($produit[9]) ? $newcatalogue->Prix_Mat_Plancher = $produit[9] : '');
            (isset($produit[10]) ? $newcatalogue->Prix_Annonce_TTC = $produit[10] : '');
            (isset($produit[11]) ? $newcatalogue->CEE_TTC = $produit[11] : '');
            (isset($produit[12]) ? $newcatalogue->TVA_MO = $produit[12] : '');
            (isset($produit[13]) ? $newcatalogue->TVA_Mat = $produit[13] : '');
            (isset($produit[14]) ? $newcatalogue->Facturation = $produit[14] : '');
            (isset($produit[15]) ? $newcatalogue->Type_Produit = $produit[15] : '');
            (isset($produit[16]) ? $newcatalogue->Spec = $produit[16] : '');
            $newcatalogue->Actif = 1;
            (isset($produit[17]) ? $newcatalogue->Fiche_Tech = $produit[17] : '');
            (isset($produit[18]) ? $newcatalogue->Note = $produit[18] : '');
            if ($newcatalogue->save()) {
                $compteur++;
            }
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

    function select_panneau($id)
    {
        if (empty($id)) {
            $obj = new Catalogue();
            return $obj->get()->all_to_array();
        } else {
            $obj = new Catalogue();
            return $obj->where('id', $id)->get()->all_to_array();
        }
    }

    function select_panneau_critere($critere)
    {
        $obj = new Catalogue();
//        $type2 = null;
//        if ($critere[0] == 1) {
//            $type = '';
//        } else if ($critere[0] == 2) {
//            $type = 'ECS';
//        } else if ($critere[0] == 3) {
//            $type = 'Chauffage';
//        } else if ($critere[0] == 4) {
//            $type = 'ECS';
//            $type2 = 'Chauffage';
//        }

//        if ($critere[1] == 'true') {
//            $racc = 'raccorde&quot;:&quot;TRUE';
//        } else {
//            $racc = 'raccorde&quot;:&quot;FALSE';
//        }
//        $obj->like('spec', $type);
//        if ($type2 == null) {
//            $obj->like('spec', $type2);
//        }
//        $obj->like('spec', $racc);

        foreach ($critere as $c) {
            switch ($c) {
                case 1 :
                    break;
                case 2 :
                    $obj->like('spec', 'ECS');
                    break;
                case 3 :
                    $obj->like('spec', 'Chauffage');
                    break;
                case 4 :
                    $obj->like('spec', 'ECS');
                    $obj->like('spec', 'Chauffage');
                    break;
            }
        }
        if ($critere[1] == 'true') {
            $racc = 'raccorde&quot;:&quot;TRUE';
        } else {
            $racc = 'raccorde&quot;:&quot;FALSE';
        }
        $obj->like('spec', $racc);
        return $obj->get()->all_to_array();
    }

    function update_soustype_produit($data)
    {
        $prod = new Catalogue();
        $data['prodnosoustype']=0;
        $compteurupdate=0;

        foreach ($data as $key => $value)
        {
            if($value != 1)
            {
                $prod->where('id', $key)->update('soustype_id',$value);
                $rsltupdate = $compteurupdate++;
            }
        }
        return $rsltupdate;
    }

    function select_panneau_by_nom($nom)
    {
        $prod = new Catalogue();
        $prodspec = $prod->where('Nom', $nom)->get();
        $tabprodspec = $prodspec->all_to_array();
        return $tabprodspec;
    }

}
