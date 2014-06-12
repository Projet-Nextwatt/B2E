<?php
/*
 * Classe Modèle pour la table Client, définir ici toutes les fonctionnalitées utilisant la table Client
 * CRUD de base mis en place.
 */
class Client extends DataMapper {
    /*
     * Variables de relation (entre tables)
     */
    var $has_one = array('User');
    var $has_many = array('Dossier');
    
    /*
     * Variables correspondantes aux colonnes de la table.
     */
    var $ID_Client = "";
    var $ID_User = "";
    var $FK_User = "";
    var $Nom = "";
    var $Prenom = "";
    var $Adresse = "";
    var $Code_Postale = "";
    var $Ville = "";
    var $Tel_1 = "";
    var $Tel_2 = "";
    var $Email = "";
    var $Date_Ajout = "";
    
    
    function __construct() 
    {
        parent ::__construct();
    }
    
    function select_client()
    {
        //Fonction de selection
    }
    
    function ajouter_client()
    {
        // Fonction d'ajout
    }
    
    function modifier_client()
    {
        //Fonction de modification
    }
    
    function supprimer_client()
    {
        $this->db->where('Nom', 'Nom');
        $this->db->delete('Client');
    }
    
    
    
    
    }

