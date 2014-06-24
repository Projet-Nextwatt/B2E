<?php

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                        // Controleur user
                        // fonctions pour afficher la page d'accueil des utilisateurs (consult_user)
                        //           pour afficher le formulaire d'ajout (add_client)
                        //           pour vérifier le formulaire (verif_form_client)
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class CI_User extends MY_Controller
{
    // layout used in this controller
    public $layout_view = 'B2E/layout/default';

    public function index()
    {
        echo 'Hello World!';
    }

    public function consult_user()
    {
        $this->load->model('Mappage/user', 'mapuser'); //Chargement du model
        $data = array();

        $data['users'] = $this->mapuser->select_user();
        $data['eneteteUsers'] = array('Nom', 'Prix du kWh', 'Inflation', 'Pollution CO<sub>2</sub>', 'Abonnement');

        $this->layout->title('Liste des Users');
        $this->layout->view('B2E/User/Accueil_user.php', $data); // Render view and layout
    }


    public function add_user()
    {
        //Remplissage de la variable $data avec l'image pour le layout
        $data = array();
        $data['minilogonextwatt'] = img_url('minilogonextwatt.png');

        //Chargement du titre et de la page avec la librairie "Layout" pour l'appliquer sur ladite page
        $this->layout->title('Ajout utilisateur B2E');
        $this->layout->view('B2E/User/Add_User', $data);
    }

    public function verif_form_user()
    {
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
        if ($this->form_validation->run() == FALSE)
        {
            // On charge la page
            $this->layout->title('Erreur d\'ajout user');
            $this->layout->view('B2E/User/Add_User', $data); // Render view and layout
        }
        else
        {
            if ($this->mapuser->ajouter_user($_POST))
            {
                // Energie object now has an ID
                $this->consulter_user();
            }
            else
            {
                $this->layout->title('Ajout user');
                $this->layout->view('B2E/Success_Error/formsuccess'); //render view and layout
            }
        }
    }

    public function gestioncategorie()
    {
        echo('Salut Yann');
    }
}
