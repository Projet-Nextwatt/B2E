<?php
/*
 * Classe Modèle pour la table Etude, définir ici toutes les fonctionnalitées utilisant la table Etude
 * CRUD de base mis en place.
 */
class Etude extends DataMapper {
     /*
     * Variables correspondantes aux colonnes de la table.
     */
    var $id = "";
    var $dossier_id = "";
    var $HEPP = "";
    var $PV_Ratio_Orientation = "";
    var $PV_Ratio_Masque = "";
    var $PV_Puissance_Systeme = "";
    var $PV_Bonus = "";
    var $Nb_Habitant = "";
    var $ECS_Coeff_Habitude = "";
    var $ECS_Efficacité = "";
    var $Surface = "";
    var $Env_Hauteur_Sous_Plafond = "";
    var $Env_Coeff_G = "";
    var $Env_Temp_Interieur = "";
    var $Env_temp_Exterieur = "";
    
    
    function __construct() 
    {
        parent ::__construct();
    }
    
    function select_etude()
    {
        //Fonction de selection
    }
    
    function ajouter_etude($data)
    {
        $etude = array(
            'dossier_id' => $data['id_dossier'],
            'HEPP' => $data['HEPP'],
            'PV_Ratio_Orientation' => $data['Orientation'],
            'PV_Ratio_Masque' => $data['Masque'],
            'PV_Puissance_Systeme' => $data['Puisysteme'],
            'PV_Bonus' => $data['Bonus'],
        );


        if ($this->db->insert('etudes', $etude))
        {
            $dossier = array(
                'etude_id' => mysql_insert_id(),
            );
            $this->db->insert('dossiers', $dossier);
            return TRUE;
        } else {
            echo '<p>' . $etude->error->string . '</p>';
            return FALSE;
        }

    }
    
    function modifier_etude()
    {
        //Fonction de modification
    }
    
    function supprimer_etude()
    {
        //Fonction de suppression
    }

    function save_panneau($panneau){

    }
    
    
    }