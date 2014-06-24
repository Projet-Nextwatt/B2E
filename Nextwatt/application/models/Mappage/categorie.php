<?php

/*
 * Classe Modèle pour la table Categorie, définir ici toutes les fonctionnalitées utilisant la table Categorie
 * CRUD de base mis en place.
 */

class Categorie extends DataMapper {
    /*
     * Variables de relation (entre tables)
     */

    var $has_many = array('User');

    /*
     * Variables correspondantes aux colonnes de la table.
     */
    /*
      var $ID_Categorie = "";
      var $Categorie_Groupe = "";
      var $Nom_Categorie = "";
      var $Type_Catalogue = "";
      var $Droit_Sudo = "";
      var $Droit_Admin = "";
      var $Droit_Catalogue = "";
     */

    function __construct() {
        parent ::__construct();
    }

    function select_categorie($id = NULL) {
        $cat = new Categorie();
        if ($id != NULL) {
            $cat->where('id', $id);
            $cat->get();
            $retour = $cat->all_to_array();
            return $retour['0'];
        } else {
            $cat->get();
            return $cat->all_to_array();
        }
    }

    function ajouter_categorie($data) {
        $cat = new Categorie();
        foreach ($data as $variable => $valeur) {
            $cat->$variable = $valeur;
        }
        if ($cat->save()) {
            return TRUE;
        } else {
            foreach ($cat->error->all as $error) {
                echo $error;
            }

            return FALSE;
        }
    }

    function modifier_categorie($data) {
        //Fonction de modification        
        $id = $data['id'];
        unset($data['id']);

        $cat = new Categorie();
        $cat->where('id', $id)->get();
        //Appliquer les datas

        foreach ($data as $variable => $valeur) {
            $cat->$variable = $valeur;
        }
        if ($cat->save()) {
            return TRUE;
        } else {
            foreach ($cat->error->all as $error) {
                echo $error;
            }
            return FALSE;
        }
    }

    function supprimer_categorie($id) {
        $cat = new Categorie();
        $cat->where('id', $id)->get();
        $cat->delete();
    }
}
