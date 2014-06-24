<?php

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                        // Controleur client
                        // fonctions pour afficher la page d'accueil des clients (consult_client)
                        //           pour afficher le formulaire d'ajout (add_client)
                        //           pour vérifier le formulaire (verif_form_client
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class CI_Client extends MY_Controller
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
        $this->load->model('Mappage/client', 'mapclient'); //Chargement du modele


        //Configuration des règles par champs
        $config = array(
            array(
                'field' => 'civilite',
                'label' => 'Civilité',
                'rules' => 'required'
            ),
            array(
                'field' => 'nom1',
                'label' => 'Nom',
                'rules' => 'required'
            ),
            array(
                'field' => 'prenom1',
                'label' => 'Prenom',
                'rules' => 'required'
            ),
            array(
                'field' => 'nom2',
                'label' => 'Nom du conjoint',
                'rules' => 'required'
            ),
            array(
                'field' => 'prenom2',
                'label' => 'Prenom du conjoint',
                'rules' => 'required'
            ),
            array(
                'field' => 'adresse',
                'label' => 'Adresse',
                'rules' => 'required'
            ),
            array(
                'field' => 'codepostal',
                'label' => 'Code Postal',
                'rules' => 'required'
            ),
            array(
                'field' => 'ville',
                'label' => 'Ville',
                'rules' => 'required'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required'
            ),
            array(
                'field' => 'tel1',
                'label' => 'Téléphone fixe',
                'rules' => 'required'
            ),
            array(
                'field' => 'tel2',
                'label' => 'Téléphone portable',
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
            $this->layout->title('Erreur d\'ajout client');
            $this->layout->view('B2E/Client/Add_Client', $data); // Render view and layout
        }
        else
        {
            if ($this->mapclient->ajouter_client($_POST))
            {
                // Energie object now has an ID
                $this->consulter_client();
            }
            else
            {
            $this->layout->title('Ajout client');
            $this->layout->view('B2E/Success_Error/formsuccess'); //render view and layout
            }
        }


    }

    public function consulter_client() {
        $this->load->model('Mappage/client', 'mapclient'); //Chargement du model
        $data = array();

        $data['client'] = $this->mapclient->select_client();
        $data['eneteteEnergies'] = array('Id', 'Nom', 'Prix du kWh', 'Inflation', 'Pollution CO<sub>2</sub>', 'Abonnement');

        $this->layout->title('Liste des clients');
        $this->layout->view('B2E/Client/Consulter_Client.php', $data); // Render view and layout
    }
}
