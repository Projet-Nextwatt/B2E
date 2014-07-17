    <?php

/*
 * Classe Modèle pour la table Categorie, définir ici toutes les fonctionnalitées utilisant la table Categorie
 * CRUD de base mis en place.
 */

class Categorie extends DataMapper {
    /*
     * Variables de relation (entre tables)
     */

    var $has_many = array('user');

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

    function __construct($id=NULL) {
        parent ::__construct($id);
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
    
    function chargergroupe() {
        $cat = new Categorie();
        $cat->distinct();
        $cat->select('Categorie_Groupe');
        $cat->get();
        $cat=$cat->all_to_array();
        
        $groupes = array();
        foreach ($cat as $unecat){
            $groupes[]=$unecat['Categorie_Groupe'];
        }
        return $groupes;
    }
    
        function chargercategories() {
        $cat = new Categorie();
        $cat->select('id,Categorie_Groupe,Nom_Categorie');
        $cat->get();
        $cat=$cat->all_to_array();
        
        $retour = array();
        foreach ($cat as $unecat){
            $retour[]=array($unecat['Categorie_Groupe'],$unecat['id'],$unecat['Nom_Categorie']);
        }
        return $retour;
    }
    
}
