<?php

/*
 * Classe Modèle pour la table User, définir ici toutes les fonctionnalitées utilisant la table USER
 * CRUD de base mis en place.
 */

class User extends DataMapper {
    /*
     * Variables de relation (entre tables)
     */

    //var $has_one = array('categorie');

    var $has_one = array(
        'categorie');

    //var $has_many = array('Hierarchie','Client');
    //const ACTIF=TRUE;
    //const INACTIF=FALSE;

    /*
     * Variables correspondantes aux colonnes de la table.
     */

    /*
      var $Identifiant = "";
      var $mdp = "";
      var $ID_Categorie = "";
      var $Nom = "";
      var $Prenom = "";
      var $Email = "";
      var $Tel = "";
      var $Date_Ajout = "";
      var $Derniere_Connexion = "";
      var $Actif = "";
     */

    function __construct($id = NULL) {
        parent ::__construct($id);
    }

    function select_user($id = NULL) {
        if ($id != NULL) {
            $user = new User($id);
            //$user->where('id', $id);
            //$user->get();
            $user->categorie->get();
            $tabuser = $user->to_array();
            $tabcat = $user->categorie->to_array();
            unset($tabcat['id']);
            return array_merge($tabuser, $tabcat);
        } else {
            $users = new User();
            $users->order_by('Actif','DESC');
            $users->get();
            foreach ($users as $index => $user) {
                $retour[$index] = $user->to_array();
                $user->categorie->get();
                unset($retour[$index]['mdp']);
                $retour[$index]['categorie_id'] = $user->categorie->Nom_Categorie;
            }
            return $retour;
        }
    }

    function list_user($actif) {
        $users = new User();
        if ($actif == TRUE) {
            $users->where('Actif', 1);
        } else {
            $users->where('Actif', 0);
        }
        $users->get();
        $retour = array();
        foreach ($users as $index => $user) {
            $retour[$index] = $user->to_array();
            $user->categorie->get();
            unset($retour[$index]['mdp']);
            unset($retour[$index]['Actif']);
            $retour[$index]['categorie_id'] = $user->categorie->Nom_Categorie;
        }
        return $retour;
    }

    function ajouter_user($data) {
        $user = array(
            'Identifiant' => $data['Identifiant'],
            'mdp' => $data['mdp'],
            'categorie_id' => $data['Categories'],
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'tel' => $data['tel'],
            'Date_Ajout' => date("Y-m-j H:i:s"),
            'Actif' => 1,
        );
        if ($this->db->insert('users', $user)) {
            return TRUE;
        } else {
            echo '<p>' . $user->error->string . '</p>';
            return FALSE;
        }
    }

    function modifier_user($data) {
        //Fonction de modification        
        $id = $data['id'];
        unset($data['id']);

        $user = new User();
        $user->where('id', $id)->get();
        //Appliquer les datas

        foreach ($data as $variable => $valeur) {
            $user->$variable = $valeur;
        }
        if ($user->save()) {
            return TRUE;
        } else {
            foreach ($user->error->all as $error) {
                echo $error;
            }
            return FALSE;
        }
    }

    function supprimer_user() {
        $this->db->where('Login', '');
        $this->db->delete('Article');
    }

    function verif_login($data)
    {
        $login = $data['login'];
        $mdp = $data['mdp'];

        $user = new User();

        $user->where('Identifiant', $login);
        $user->get();
        $tab_user = $user->all_to_array();
        $rslt = count($tab_user);

        if($rslt != 0)
        {
            if($tab_user[0]['Identifiant']==$login && $tab_user[0]['mdp']==$mdp)
            {
                $logincorrect = 1;
                $prenom = $tab_user[0]['prenom'];
                $tablogin= array($logincorrect,$prenom);
                return $tablogin;
            }
            else
            {
                $error = 'Mauvaise combinaison login/mdp';
                return $error;
            }
        }
        else
        {
            $error='Login innexistant';
            return $error;
        }
    }
    public function derniereconnexion($login)
    {
        $user = array(
            'Derniere_Connexion' => date("Y-m-j H:i:s"),
        );

        $this->db->where('Identifiant', $login);
        $this->db->update('users', $user);
    }

}
