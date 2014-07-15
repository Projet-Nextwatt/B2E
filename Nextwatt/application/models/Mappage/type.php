<?php

/*
 * Classe Modèle pour la table Type, définir ici toutes les fonctionnalitées utilisant la table Type
 * CRUD de base mis en place.
 */

class Type extends DataMapper
{
    /*
     * Variables de relation (entre tables)
     */
    var $has_many = array('soustypes');

    /*
     * Variables correspondantes aux colonnes de la table.
     */
    var $ID_Type = "";
    var $Nom_Type = "";
    var $Code_Type = "";


    function __construct()
    {
        parent ::__construct();
    }

    function select_types($id)
    {
        if (empty($id)) {
            $obj = new Type();
            return $obj->get()->all_to_array();
        } else {
            $obj = new Catalogue();
            return $obj->where('id', $id)->get()->all_to_array();
        }
    }

    public function afftypesoustype()
    {
        $type = new Type();
        $unevariable = array();
        $unevariable = $type->get();
       //$type->soustypes->get();
         echo($unevariable);





        return $type;

    }

    function ajouter_type()
    {
        // Fonction d'ajout
    }

    function modifier_type()
    {
        //Fonction de modification
    }

    function chargertypes()
    {
        $type = new Type();
        $type->select('id,Categorie_Groupe,Nom_Categorie');
        $type->get();
        $type = $type->all_to_array();

        $retour = array();
        foreach ($type as $untype) {
            $retour[] = array($untype['Categorie_Groupe'], $untype['id'], $untype['Nom_Categorie']);
        }
        return $retour;
    }

}
