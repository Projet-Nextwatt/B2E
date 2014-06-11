<?php

class Client extends MY_Controller
{
    // Layout used in this controller
    public $layout_view = 'B2E/layout/default';

    public function index()
    {
        echo 'Hello World!';
    }

    public function consult_client()
    {
        $data = array();
        $data['minilogonextwatt'] = img_url('minilogonextwatt.png');

        $this->layout->title('Consultation client');
        $this->layout->view('B2E/Client/Accueil_Client', $data); // Render view and layout

    }

    public function add_client()
    {
        $data = array();
        $data['minilogonextwatt'] = img_url('minilogonextwatt.png');

        $this->layout->title('Ajout client');
        $this->layout->view('B2E/Client/Add_Client', $data); // Render view and layout

    }

    public function verif_form_client()
    {
        $data = array();
        $data['minilogonextwatt'] = img_url('minilogonextwatt.png');



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
