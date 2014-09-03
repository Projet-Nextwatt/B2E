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
        $etude = array(                             //création du tableau pour le insert, récupération des valeurs passés par $data
            'HEPP' => $data['HEPP'],
            'PV_Ratio_Orientation' => $data['Orientation'],
            'PV_Ratio_Masque' => $data['Masque'],
            'PV_Puissance_Systeme' => $data['Puisysteme'],
        );

        if(isset($data['Bonus']))                   // vérification de l'existence de $data['Bonus'] pour ne pas faire planter le insert
        {
            $etude['PV_Bonus'] = $data['Bonus'];
        }


        if ($this->db->insert('etudes', $etude))    // ajout dans la BDD des informations pré-remplis plus haut
        {
            $datadossier = array(
                'etude_id' => mysql_insert_id(),    // On récupère l'ID de la dernière requête exécutée
                'titre_PV'=> $data['titre'],
                'recette_PV'=>$data['recette'],
                'Date_Modification'=>date("Y-m-d"),
            );

            $this->db->where('id', $data['id_dossier']); // On va update dans le dossier nous concernant en donnant l'id de l'étude qui vient d'être ajoutée
            $this->db->update('dossiers ', $datadossier);
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