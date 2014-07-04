<?php

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Controleur user
// fonctions pour afficher la page d'accueil des utilisateurs (consult_user)
//           pour afficher le formulaire d'ajout (add_client)
//           pour vérifier le formulaire (verif_form_client)
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class CI_User extends MY_Controller {  
    
    public $layout_view = 'B2E/layout/default';
    
    
    // User ////////////////////////////////////////////////////////////////////////////////
    public function consult_user() {
        $this->load->model('Mappage/user', 'mapuser'); //Chargement du model
        $data = array();

        $data['users'] = $this->mapuser->select_user();
        $data['eneteteUsers'] = array('Nom', 'Prix du kWh', 'Inflation', 'Pollution CO<sub>2</sub>', 'Abonnement');

        $this->layout->title('Liste des Users');
        $this->layout->view('B2E/User/Accueil_user.php', $data); // Render view and layout
    }

    public function add_user() {
        $this->load->model('Mappage/categorie', 'categorie'); //Chargement du modele user
        $this->load->model('Mappage/user', 'mapuser'); //Chargement du modele categorie
        
        $data = array();
            //chargement des catégories pour la liste déroulante
        $categories = $this->categorie->chargercategories();
        $data["categories"] =$categories;
        
        //On check le booléen renvoyé (True si tout est nickel, False si un champs ne respecte pas les règles)
        $this->form_validation->set_rules($this->configValidationUser);
        if ($this->form_validation->run() == FALSE) {
            // On charge la page
            $this->layout->title('Ajout d\'un utilisateur');
            $this->layout->view('B2E/User/Add_User', $data); // Render view and layout
        } else {
            
            $this->form_validation->set_rules($this->configTraitementUser);
            if ($this->mapuser->ajouter_user($_POST)) {
                // Energie object now has an ID
                $this->consult_user();
            } else {
                // Show all error messages
                $this->layout->title('Erreur');
                $this->layout->view('B2E/User/Add_User',$data); //render view and layout
            }
        }
    }
    
    public function modif_user() {
        $this->load->model('Mappage/categorie', 'categorie'); //Chargement du modele user
        $this->load->model('Mappage/user', 'mapuser'); //Chargement du modele categorie
        
        
        $data = array();
            //chargement des catégories pour la liste déroulante
        $categories = $this->categorie->chargercategories();
        $data["categories"] =$categories;
        $data['user'] = $this->mapuser->select_user($this->session->userdata('CI_User/modif_user'));
        
        //On check le booléen renvoyé (True si tout est nickel, False si un champs ne respecte pas les règles)
        $this->form_validation->set_rules($this->configValidationModifUser);
        if (isset($_POST['type'])) {
            if ($_POST['type'] == 'mdp') {
                $this->form_validation->set_rules($this->configValidationMDP);
            }
        }

        if ($this->form_validation->run() == FALSE) {
            // On charge la page
            $this->layout->title('Modification d\'un utilisateur');
            $this->layout->view('B2E/User/Modif_User', $data);
        } else {

            $this->form_validation->set_rules($this->configTraitementModifUser);
            if (isset($_POST['type'])) {
                if ($_POST['type'] == 'mdp') {
                    $this->form_validation->set_rules($this->configValidationMDP);
                }
                unset($_POST['type']);
            }
            $this->form_validation->run();
            if ($this->mapuser->modifier_user($_POST)) {
                // Energie object now has an ID
                 
                header('Location:'.site_url("CI_user/consult_user"));
                //$this->consult_user();
            } else {
                // Show all error messages
                $this->layout->title('Erreur');
                $this->layout->view('B2E/User/Modif_User',$data); //render view and layout
            }
        }
    }
   

   
    //Catégorie ////////////////////////////////////////////////////////////////////////////////////
    public function gestioncategorie() {
        $this->load->model('Mappage/categorie', 'categorie'); //Chargement du model
        $data = array();

        $data['categories'] = $this->categorie->select_categorie();
        //$data['eneteteEnergies'] = array('Id', 'Nom', 'Prix du kWh', 'Inflation', 'Pollution CO<sub>2</sub>', 'Abonnement');

        $this->layout->title('Liste des catégories');
        $this->layout->view('B2E/User/Consulter_Categories', $data);
    }

    public function addcategorie() {
        $this->load->model('Mappage/categorie', 'categorie'); //Chargement du modele
        $data = array(); //Pour la vue

        $this->layout->js(js_url('jsuser'));
        $this->form_validation->set_rules($this->configValidationAddCategorie);

        if ($this->form_validation->run() == FALSE) {
            //Formualire invalide, retour à celui-ci
            $this->layout->title('Ajouter une categorie');
            $this->layout->view('B2E/User/Add_Categorie.php', $data); // Render view and layout
        } else {
            //Formulaire ok, traitement des données
            //Clean des données
            $this->form_validation->set_rules($this->configTraitementAddCategorie);
            $this->form_validation->run();

            if ($this->categorie->ajouter_categorie($_POST)) {
                // Energie object now has an ID
                $this->gestioncategorie();
            } else {
                /*    //Comment j'envoi le tableau à la vue? -********************************************************
                  foreach ($u->error->all as $error) {
                  echo $error;
                  }
                 */

                //$data['error']=$error;
                $this->layout->title('Erreur');
                $this->layout->view('B2E/User/Add_Categorie.php', $data); // Render view and layout
            }
        }
    }

    public function modifcategorie() {
        $this->load->model('Mappage/categorie', 'categorie'); //Chargement du modele
        $data = array(); //Pour la vue
        $data['categorie'] = $this->categorie->select_categorie($this->session->userdata('CI_user/modifcategorie'));

        $this->layout->js(js_url('jsuser'));
        $this->form_validation->set_rules($this->configValidationAddCategorie);

        if ($this->form_validation->run() == FALSE) {
            //Formualire invalide, retour à celui-ci


            $this->layout->title('Moifier une categorie');
            $this->layout->view('B2E/User/Add_Categorie.php', $data); // Render view and layout
        } else {
            //Formulaire ok, traitement des données
            //Clean des données
            $this->form_validation->set_rules($this->configTraitementAddCategorie);
            $this->form_validation->run();
            if ($this->categorie->modifier_categorie($_POST)) {
                $this->gestioncategorie();
            } else {
                echo 'error';
            }
        }
    }

    //Ajax Catégorie
    public function ajax_supprimercategorie() {
        $this->load->model('Mappage/categorie', 'categorie'); //Chargement du modele
        $this->categorie->supprimer_categorie($_POST['id']);
    }

    public function ajax_categoriegroupe() {
        $this->load->model('Mappage/categorie', 'categorie'); //Chargement du modele
        $groupes = $this->categorie->chargergroupe();
        echo json_encode($groupes);
    }


    // Validation et traitement des formualaires
    public $configValidationAddCategorie = array(
        array(
            'field' => 'Categorie_Groupe',
            'label' => 'Categorie_Groupe',
            'rules' => 'required|trim|max_length[255]'
        ),
        array(
            'field' => 'Nom_Categorie',
            'label' => 'Nom_Categorie',
            'rules' => 'required|trim|max_length[255]'
        ),
        array(
            'field' => 'Droit_SUDO',
            'label' => 'Droit_SUDO',
            'rules' => 'required'
        ),
        array(
            'field' => 'Droit_Admin',
            'label' => 'Droit_Admin',
            'rules' => ''
        ),
        array(
            'field' => 'Droit_Catalogue',
            'label' => 'Droit_Catalogue',
            'rules' => ''
        ),
        array(
            'field' => 'Droit_Edit_Devis',
            'label' => 'Droit_Edit_Devis',
            'rules' => ''
        ),
    );
    public $configTraitementAddCategorie = array(
        array(
            'field' => 'Categorie_Groupe',
            'label' => 'Categorie_Groupe',
            'rules' => 'xss_clean|htmlentities'
        ),
        array(
            'field' => 'Nom_Categorie',
            'label' => 'Nom_Categorie',
            'rules' => 'xss_clean|htmlentities'
        ),
        array(
            'field' => 'Droit_SUDO',
            'label' => 'Droit_SUDO',
            'rules' => 'callback_checkbox'
        ),
        array(
            'field' => 'Droit_Admin',
            'label' => 'Droit_Admin',
            'rules' => 'callback_checkbox'
        ),
        array(
            'field' => 'Droit_Catalogue',
            'label' => 'Droit_Catalogue',
            'rules' => 'callback_checkbox'
        ),
        array(
            'field' => 'Droit_Edit_Devis',
            'label' => 'Droit_Edit_Devis',
            'rules' => 'callback_checkbox'
        ),
    );
    
    public  $configValidationUser = array(
        array(
            'field' => 'Identifiant',
            'label' => 'Identifiant',
            'rules' => 'required|is_unique[users.Identifiant]|trim|max_length[255]'
        ),
        array(
            'field' => 'mdp',
            'label' => 'Mot de Passe',
            'rules' => 'matches[confmdp]|sha1|required|trim'
        ),
        array(
            'field' => 'confmdp',
            'label' => 'Confirmation mot de passe',
            'rules' => 'trim'
        ),
        array(
            'field' => 'prenom',
            'label' => 'Prenom',
            'rules' => 'required|trim|max_length[255]'
        ),
        array(
            'field' => 'nom',
            'label' => 'Nom',
            'rules' => 'required|trim|max_length[255]|mb_strtoupper'
        ),
        array(
            'field' => 'email',
            'label' => 'E-mail',
            'rules' => 'required|valid_email'
        ),
        array(
            'field' => 'tel',
            'label' => 'Telephone',
            'rules' => 'callback_tel'
        ),
        array(
            'field' => 'categorie',
            'label' => 'Categorie',
            'rules' => ''
        ),
    );
    
    public $configTraitementUser = array(
        array(
            'field' => 'Identifiant',
            'label' => 'Identifiant',
            'rules' => 'xss_clean|htmlentities'
        ),
        array(
            'field' => 'mdp',
            'label' => 'Mot de Passe',
            'rules' => ''
        ),
        array(
            'field' => 'confmdp',
            'label' => 'Confirmation mot de passe',
            'rules' => ''
        ),
        array(
            'field' => 'prenom',
            'label' => 'Prenom',
            'rules' => 'xss_clean|htmlentities'
        ),
        array(
            'field' => 'nom',
            'label' => 'Nom',
            'rules' => 'xss_clean|htmlentities'
        ),
        array(
            'field' => 'email',
            'label' => 'E-mail',
            'rules' => ''
        ),
        array(
            'field' => 'tel',
            'label' => 'Telephone',
            'rules' => ''
        ),
        array(
            'field' => 'categorie',
            'label' => 'Categorie',
            'rules' => ''
        ),
    );
    
    
    public  $configValidationModifUser = array(
        array(
            'field' => 'Identifiant',
            'label' => 'Identifiant',
            'rules' => 'required|trim|max_length[255]'
        ),
        array(
            'field' => 'prenom',
            'label' => 'Prenom',
            'rules' => 'required|trim|max_length[255]'
        ),
        array(
            'field' => 'nom',
            'label' => 'Nom',
            'rules' => 'required|trim|max_length[255]|mb_strtoupper'
        ),
        array(
            'field' => 'email',
            'label' => 'E-mail',
            'rules' => 'required|valid_email'
        ),
        array(
            'field' => 'tel',
            'label' => 'Telephone',
            'rules' => 'callback_tel'
        ),
        array(
            'field' => 'categorie',
            'label' => 'Categorie',
            'rules' => ''
        ),
    );
    
    public $configTraitementModifUser = array(
        array(
            'field' => 'Identifiant',
            'label' => 'Identifiant',
            'rules' => 'xss_clean|htmlentities'
        ),
        array(
            'field' => 'confmdp',
            'label' => 'Confirmation mot de passe',
            'rules' => ''
        ),
        array(
            'field' => 'prenom',
            'label' => 'Prenom',
            'rules' => 'xss_clean|htmlentities'
        ),
        array(
            'field' => 'nom',
            'label' => 'Nom',
            'rules' => 'xss_clean|htmlentities'
        ),
        array(
            'field' => 'email',
            'label' => 'E-mail',
            'rules' => ''
        ),
        array(
            'field' => 'tel',
            'label' => 'Telephone',
            'rules' => ''
        ),
        array(
            'field' => 'categorie',
            'label' => 'Categorie',
            'rules' => ''
        ),
        array(
            'field' => 'Actif',
            'label' => 'Actif',
            'rules' => 'callback_checkbox'
        ),
    );
    
    public  $configValidationMDP = array(
        array(
            'field' => 'mdp',
            'label' => 'Mot de Passe',
            'rules' => 'matches[confmdp]|sha1|required|trim'
        ),
        array(
            'field' => 'confmdp',
            'label' => 'Confirmation mot de passe',
            'rules' => 'trim'
        ),
    );
    
    public $configTraitementMDP = array(
        array(
            'field' => 'mdp',
            'label' => 'Mot de Passe',
            'rules' => ''
        ),
        array(
            'field' => 'confmdp',
            'label' => 'Confirmation mot de passe',
            'rules' => ''
        ),
    );
    
        //Callback
    public function checkbox(&$str) {
        //Fonction de traitement du formulaire appelée en callback
        if ($str == 'on') {
            $str = 1;
            return TRUE;
        } else {
            $str = 0;
            return TRUE;
        }
    }

    public function tel(&$nbr) {
        $nbr = preg_replace("#[^0-9]#", '', $nbr);
        
        if(strlen($nbr) == 10)
	{
		for($i=0;$i<5;$i++)
                {
                    $nbr_array[] = substr($nbr, $i*2, 2);
                }
		$nbr = implode('.', $nbr_array);
		return TRUE;
	}
	elseif (strlen($nbr) == 0 )
	{
		return TRUE;
	}
	else
	{
            
            $this->form_validation->set_message('tel', 'Le champs %s doit contenir 10 chiffres');
		return FALSE;
	}
    }

}
