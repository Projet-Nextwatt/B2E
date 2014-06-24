<?php

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Controleur user
// fonctions pour afficher la page d'accueil des utilisateurs (consult_user)
//           pour afficher le formulaire d'ajout (add_client)
//           pour vérifier le formulaire (verif_form_client)
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class CI_User extends MY_Controller {

    // layout used in this controller
    public $layout_view = 'B2E/layout/default';
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

    public function index() {
        echo 'Hello World!';
    }

    public function consult_user() {
        $this->load->model('Mappage/user', 'mapuser'); //Chargement du model
        $data = array();

        $data['users'] = $this->mapuser->select_user();
        $data['eneteteUsers'] = array('Nom', 'Prix du kWh', 'Inflation', 'Pollution CO<sub>2</sub>', 'Abonnement');

        $this->layout->title('Liste des Users');
        $this->layout->view('B2E/User/Accueil_user.php', $data); // Render view and layout
    }

    public function add_user() {
        //Remplissage de la variable $data avec l'image pour le layout
        $data = array();
        $data['minilogonextwatt'] = img_url('minilogonextwatt.png');

        //Chargement du titre et de la page avec la librairie "Layout" pour l'appliquer sur ladite page
        $this->layout->title('Ajout utilisateur B2E');
        $this->layout->view('B2E/User/Add_User', $data);
    }

    public function verif_form_user() {
        $this->load->model('Mappage/user', 'mapuser'); //Chargement du modele

        $data = array();
        //Configuration des règles par champs
        $config = array(
            array(
                'field' => 'Identifiant',
                'label' => 'Identifiant',
                'rules' => 'required'
            ),
            array(
                'field' => 'mdp',
                'label' => 'Mot de Passe',
                'rules' => 'required|matches[confmdp]'
            ),
            array(
                'field' => 'confmdp',
                'label' => 'Confirmation mot de passe',
                'rules' => 'required'
            ),
            array(
                'field' => 'prenom',
                'label' => 'Prenom',
                'rules' => 'required'
            ),
            array(
                'field' => 'nom',
                'label' => 'Nom',
                'rules' => 'required'
            ),
            array(
                'field' => 'email',
                'label' => 'E-mail',
                'rules' => 'required|valid_email'
            ),
            array(
                'field' => 'tel',
                'label' => 'Telephone',
                'rules' => 'required'
            ),
            array(
                'field' => 'categorie',
                'label' => 'Categorie',
                'rules' => 'required'
            ),
        );

        //On applique les règles
        $this->form_validation->set_rules($config);

        //On check le booléen renvoyé (True si tout est nickel, False si un champs ne respecte pas les règles)
        //Et on agit en conséquence
        if ($this->form_validation->run() == FALSE) {
            // On charge la page
            $this->layout->title('Erreur d\'ajout user');
            $this->layout->view('B2E/User/Add_User', $data); // Render view and layout
        } else {
            if ($this->mapuser->ajouter_user($_POST)) {
                // Energie object now has an ID
                $this->consulter_user();
            } else {
                $this->layout->title('Ajout user');
                $this->layout->view('B2E/Success_Error/formsuccess'); //render view and layout
            }
        }
    }

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

        var_dump($_POST);
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

    public function ajax_supprimercategorie() {
        $this->load->model('Mappage/categorie', 'categorie'); //Chargement du modele
        $this->categorie->supprimer_categorie($_POST['id']);
    }

    public function checkbox(&$str) {
        if ($str == 'on') {
            $str=1;
            return TRUE;
        } else {
            $str=0;
        }
    }

}
