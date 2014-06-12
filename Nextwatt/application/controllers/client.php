<?php

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                        // Controleur client
                        // fonctions pour afficher la page d'accueil des clients (consult_client)
                        //           pour afficher le formulaire d'ajout (add_client)
                        //           pour vérifier le formulaire (verif_form_client
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class Client extends MY_Controller
{
    // layout used in this controller
    public $layout_view = 'B2E/layout/default';

    public function index()
    {
        echo 'Hello World!';
    }

    public function consult_client()
    {
        //Remplissage de la variable $data avec l'image pour le layout
        $data = array();
        $data['minilogonextwatt'] = img_url('minilogonextwatt.png');
        //Chargement du titre et de la page avec la librairie "Layout" pour l'appliquer sur ladite page
        $this->layout->title('Consultation client');
        $this->layout->view('B2E/Client/Accueil_Client', $data); // Render view and layout

    }

    public function add_client()
    {
        //Remplissage de la variable $data avec l'image pour le layout
        $data = array();
        $data['minilogonextwatt'] = img_url('minilogonextwatt.png');
        //Chargement du titre et de la page avec la librairie "Layout" pour l'appliquer sur ladite page
        $this->layout->title('Ajout client');
        $this->layout->view('B2E/Client/Add_Client', $data); // Render view and layout

    }

    public function verif_form_client()
    {
        //Remplissage de la variable $data avec l'image pour le layout
        $data = array();
        $data['minilogonextwatt'] = img_url('minilogonextwatt.png');


        //Configuration des règles
        $config = array(
            array(
                'field' => 'identifiant',
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

        $this->form_validation->set_rules($config);



        if ($this->form_validation->run() == FALSE) {
            // On charge la page
            $this->layout->title('Erreur d\'ajout client');
            $this->layout->view('B2E/Client/Add_Client', $data); // Render view and layout
        } else {
            $this->layout->title('Ajout client');
            $this->layout->view('formsuccess'); //render view and layout
        }


    }
}
