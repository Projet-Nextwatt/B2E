<?php

class User extends MY_Controller
{
    public $layout_view = 'B2E/layout/default';

    public function index()
    {
        echo 'Hello World!';
    }

    public function consult_user()
    {
        $data = array();
        $data['minilogonextwatt'] = img_url('minilogonextwatt.png');

        $this->layout->title('Accueil utilisateur B2E');

        // Charge la page
        $this->layout->view('B2E/User/Accueil_User', $data);
    }

    public function add_user()
    {
        $data = array();
        $data['minilogonextwatt'] = img_url('minilogonextwatt.png');

        $this->layout->title('Ajout utilisateur B2E');

        // Charge la page

        // Charge la page
        $this->layout->view('B2E/User/Add_User', $data);
    }

    public function verif_form_user()
    {
        $data = array();
        $data['minilogonextwatt'] = img_url('minilogonextwatt.png');

        $this->layout->title('Verif utilisateur B2E');

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
            $this->layout->view('Add_User');
        } else {
            $this->layout->view('formsuccess');
        }
    }
}
