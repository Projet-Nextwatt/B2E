<?php
/*
 * Classe Modèle pour la table Soustype, définir ici toutes les fonctionnalitées utilisant la table Soustype
 * CRUD de base mis en place.
 */
class Soustypes extends DataMapper {
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
    
    function select_soustype($id = NULL)
    {
        $st = new Soustypes();
        if ($id != NULL) {
            $st->where('id', $id);
            $st->get();
            $retour = $st->all_to_array();
            return $retour['0'];
        } else {
            $st->get();
            return $st->all_to_array();;
        }
    }

    function select_soustype_tableau($id = NULL)
    {
        $soustype = new Soustypes();
        if ($id != NULL) {
            $soustype->where('id', $id);
            $soustype->get();
            $retour = $soustype->all_to_array();
            return $retour['0'];
        } else {
            $soustype->get();
            $champs = array('id','nomcourt', 'nomdevis', 'bouquetCI', 'bouquetEPTZ', 'CIunitaire');
            $retour = $soustype->all_to_array($champs);
            return $retour;
        }
    }
    
    function ajouter_soustype($data)
    {

        $soustype = array(
            'ID_Type' => $data['Produit'],
            'nomcourt' => $data['nomcourt'],
            'nomdevis' => $data['nomdevis'],
            'bouquetCI' => $data['bouquetCI'],
            'bouquetEPTZ' => $data['bouquetEPTZ'],
            'CIunitaire' => $data['CIunitaire'],
        );

        $this->db->insert('soustypes', $soustype);
    }
    
    function modifier_soustype($data)
    {
        $id = $data['id'];
        unset($data['id']);

        $st = new Soustypes();
        $st->where('id', $id)->get();
        //Appliquer les datas

        foreach ($data as $variable => $valeur) {
            $st->$variable = $valeur;
        }
        return $st->save();
    }
    
    function supprimer_soustype($id)
    {
        $st = new Soutypes();
        $st->where('id', $id)->get();

        $st->delete();
    }

    }