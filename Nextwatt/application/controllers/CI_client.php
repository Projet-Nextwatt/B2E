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
        $this->load->model('Mappage/client', 'mapclient'); //Chargement du model
        $this->load->library('fonctionspersos');

        $data = array();
        $data['clients'] = $this->mapclient->select_client_tableau();
        $data['enteteclients'] = array('Id', 'Nom', 'Prenom', 'Email', 'Telephone fixe', 'Telephone Portable', 'Responsable');
        $this->layout->title('Liste des clients');
        $this->layout->view('B2E/Client/Consulter_Client.php', $data); // Render view and layout
    }

    public function add_client()
    {
        //Remplissage de la variable $data avec l'image pour le layout
        $data = array();
        $data['minilogonextwatt'] = img_url('minilogonextwatt.png');
        //Chargement du titre et de la page avec la librairie "Layout" pour l'appliquer sur ladite page
        $this->load->model('Mappage/user', 'user'); //Chargement du modele
        $users  = $this->user->list_user(TRUE);
        foreach ($users as $user){
            $data['users'][]=array(  'label'=>$user['categorie_id'],
                                    'value'=>$user['id'],
                                    'texte'=>$user['prenom'].' '.$user['nom']);
        }

        
        $this->layout->title('Ajout client');
        $this->layout->view('B2E/Client/Add_Client', $data); // Render view and layout
    }

    public function verif_form_client()
    {
        $this->load->model('Mappage/client', 'mapclient'); //Chargement du modele
        $data = array();
        
        $this->load->model('Mappage/user', 'user'); //Chargement du modele
        $users = $this->user->list_user(TRUE);
        foreach ($users as $user) {
            $data['users'][] = array('label' => $user['categorie_id'],
                                'value' => $user['id'],
                                'texte' => $user['prenom'] . ' ' . $user['nom']);
        }

        //Configuration des règles par champs


        //On applique les règles
        $this->form_validation->set_rules($this->configclient);


        //On check le booléen renvoyé (True si tout est nickel, False si un champs ne respecte pas les règles)
        //Et on agit en conséquence
        if ($this->form_validation->run() == FALSE) {
            // On charge la page
            $this->layout->title('Erreur d\'ajout client');
            $this->layout->view('B2E/Client/Add_Client', $data); // Render view and layout
        } else
        {
            if ($this->mapclient->ajouter_client($_POST))
            {
                // Client object now has an ID
            }
            else
            {
                $this->consult_client();
            }
        }
    }

    public function modif_client()
    {
        $data = array(); //Pour la vue
        $this->load->model('Mappage/client', 'mapclient'); //Chargement du modele
        $data['client']  = $this->mapclient->select_client($this->session->userdata('CI_client/modif_client'));
        $this->load->model('Mappage/user', 'user'); //Chargement du modele
        $users  = $this->user->list_user(TRUE);
        foreach ($users as $user){
            $data['users'][]=array(  'label'=>$user['categorie_id'],
                                    'value'=>$user['id'],
                                    'texte'=>$user['prenom'].' '.$user['nom']);
        }

        $this->form_validation->set_rules($this->configclient);


        if ($this->form_validation->run() == FALSE) {
            //Formualire invalide, retour à celui-ci

            $this->layout->title('Modifier un client');
            $this->layout->view('B2E/Client/Add_Client.php', $data); // Render view and layout
        } else {
            //Formulaire ok, traitement des données
            //Clean des données
            $this->form_validation->set_rules($this->configtraitementclient);
            $this->form_validation->run();
            if ($this->mapclient->modifier_client($_POST)) {
                $this->consult_client();
            } else {
                echo 'error';
            }
        }
    }

    public function ajax_supprimerclient()
    {
        $this->load->model('Mappage/client', 'mapclients'); //Chargement du modele
        $this->mapclients->supprimer_client($_POST['id']);
        $this->consult_client();
    }

    public $configclient = array(
            array(
                'field' => 'civilite',
                'label' => 'Civilité',
                'rules' => ''
            ),
            array(
                'field' => 'nom1',
                'label' => 'Nom',
                'rules' => 'required|max_length[255]|trim|mb_strtoupper'
            ),
            array(
                'field' => 'prenom1',
                'label' => 'Prenom',
                'rules' => 'trim|max_length[255]'
            ),
            array(
                'field' => 'nom2',
                'label' => 'Nom du conjoint',
                'rules' => 'trim|max_length[255]|mb_strtoupper'
            ),
            array(
                'field' => 'prenom2',
                'label' => 'Prenom du conjoint',
                'rules' => 'trim|max_length[255]'
            ),
            array(
                'field' => 'adresse',
                'label' => 'Adresse',
                'rules' => 'required|trim|max_length[255]'
            ),
            array(
                'field' => 'codepostal',
                'label' => 'Code Postal',
                'rules' => 'required|trim|max_length[10]|numeric'
            ),
            array(
                'field' => 'ville',
                'label' => 'Ville',
                'rules' => 'required|trim|max_length[255]|mb_strtoupper'
            ),
            array(
                'field' => 'tel1',
                'label' => 'Téléphone fixe',
                'rules' => 'trim|callback_tel'
            ),
            array(
                'field' => 'tel2',
                'label' => 'Téléphone portable',
                'rules' => 'trim|callback_tel'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'valid_email|trim'
            ),
        );

    public $configtraitementclient = array(
        array(
            'field' => 'nom1',
            'label' => 'Nom',
            'rules' => 'xss_clean|htmlentities'
        ),
        array(
            'field' => 'prenom1',
            'label' => 'Prenom',
            'rules' => 'xss_clean|htmlentities'
        ),
        array(
            'field' => 'nom2',
            'label' => 'Nom (Conjoint)',
            'rules' => 'xss_clean|htmlentities'
        ),array(
            'field' => 'prenom2',
            'label' => 'Prenom (Conjoint)',
            'rules' => 'xss_clean|htmlentities'
        ),array(
            'field' => 'adresse',
            'label' => 'Adresse',
            'rules' => 'xss_clean|htmlentities'
        ),array(
            'field' => 'ville',
            'label' => 'Ville',
            'rules' => 'xss_clean|htmlentities'
        ),
    );
}
