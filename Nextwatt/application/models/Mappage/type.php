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
            $obj = new Type();
            $obj->where('id', $id)->get();
            return $obj->all_to_array();
        }
    }

    public function afftypesoustype($id = NULL)
    {
        if(isset($id))
        {
            $this->db
                ->from('types')
                ->where('types.id',$id)
                ->join('soustypes', 'types.id = soustypes.type_id');
            $query = $this->db->get();
        }
        else
        {
            $this->db
                ->from('types')
                ->join('soustypes', 'types.id = soustypes.type_id');
            $query = $this->db->get();
        }

        if($query->num_rows()>0)
        {
            foreach($query->result_array() as $row)
            {
                $data[] = $row;
            }
            return $data;
        }
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
