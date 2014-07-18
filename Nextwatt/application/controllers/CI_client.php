<?php

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Controleur client
// fonctions pour afficher la page d'accueil des clients (consult_client)
//           pour afficher le formulaire d'ajout (add_client)
//           pour vérifier le formulaire (verif_form_client
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class CI_Client extends MY_Controller {

    // layout used in this controller
    public $layout_view = 'B2E/layout/default';

    public function index() {
        echo 'Hello World!';
    }

    public function consult_client() {
        $data['dossier'] = FALSE;
        if (isset($_GET['dossier']) AND $_GET['dossier'] == TRUE) {
            //Selection d'un client pour l'associer à un doosier
            $data['dossier'] = TRUE;
        }

        $this->load->model('Mappage/client', 'mapclient'); //Chargement du model
        $this->load->model('Mappage/user', 'user'); //Chargement du modele
        $this->load->library('fonctionspersos');

        $data = array();
        //Liste des clients
        $clients = $this->mapclient->list_client(TRUE);
        $data['mesclients'] = array();
        foreach ($clients as $client) {
            if ($client['user_id'] == $this->session->userdata('userconnect')['id_login']) {
                $data['mesclients'][] = $client;
            } else {
                $data['clients'][$client['user_id']][] = $client;
            }
        }

<<<<<<< HEAD
        //Liste des clients archivés
        $clientsarchives = $this->mapclient->list_client(FALSE);
        $data['mesclientsarchive'] = array();
        foreach ($clientsarchives as $client) {
            if ($client['user_id'] == $this->session->userdata('userconnect')['id_login']) {
                $data['mesclientsarchive'][] = $client;
            }
            $data['clientsarchive'][$client['user_id']][] = $client;
        }

        //Liste des users
        $users = $this->user->list_user(TRUE);
        foreach ($users as $user) {
            $data['users'][$user['id']] = $user;
        }

        //tableau des users pour le dropdown de nouveau client
        foreach ($users as $user) {
            $data['usersdropdown'][] = array('label' => $user['categorie_id'],
                'value' => $user['id'],
                'texte' => $user['prenom'] . ' ' . $user['nom']);
        }

        //Entete du tableau
=======
        $clientsarchives = $this->mapclient->list_client(FALSE);
        foreach ($clientsarchives as $client) {
            if ($client['user_id'] == $this->session->userdata('userconnect')['id_login']) {
                $data['mesclientsarchive'] = $client;
            }
            $data['clientsarchive'][$client['user_id']][] = $client;
        }

        $users = $this->user->list_user(TRUE);
        foreach ($users as $user) {
            $data['users'][$user['id']] = $user;
        }

>>>>>>> origin/Developpement
        $data['enteteclients'] = array('Id', 'Nom', 'Prenom', 'Email', 'Telephone fixe', 'Telephone Portable', 'Responsable');






        //C'est l'heure de l'affichage
        //Si le fomulaire d'ajout n'a pas été rempli, on redirige normailement
        if (empty($_POST)) {
            $this->layout->title('Liste des clients');
            $this->layout->view('B2E/Client/Consulter_Client.php', $data); // Render view and layout
        } else {
            //sinon on verifie de formulaire
            $this->form_validation->set_rules($this->configclient);
            if ($this->form_validation->run() == FALSE) {
                // Problème de saisi: On charge la page
                $this->layout->title('Erreur d\'ajout client');
                $this->layout->view('B2E/Client/Consulter_Client.php', $data); // Render view and layout
            } else {
                //Pas de problème, on traite et on enregiste
                $this->form_validation->set_rules($this->configtraitementclient);
                $this->form_validation->run();

                $id_client = $this->mapclient->ajouter_client($_POST);

                if ($data['dossier'] == TRUE) {
                    header('Location:' . site_url("CI_client/consult_client"));
                } else {
                    $tabsession = array("CI_client/modif_client" => $id_client);
                    $this->session->set_userdata($tabsession);
                    header('Location:' . site_url("CI_client/modif_client"));
                }
            }
        }
    }

    public function add_client() {
        //Remplissage de la variable $data avec l'image pour le layout
        $data = array();
        $data['minilogonextwatt'] = img_url('minilogonextwatt.png');
        //Chargement du titre et de la page avec la librairie "Layout" pour l'appliquer sur ladite page
        $this->load->model('Mappage/user', 'user'); //Chargement du modele
        $users = $this->user->list_user(TRUE);
        foreach ($users as $user) {
            $data['users'][] = array('label' => $user['categorie_id'],
                'value' => $user['id'],
                'texte' => $user['prenom'] . ' ' . $user['nom']);
        }


        $this->layout->title('Ajout client');
        $this->layout->view('B2E/Client/Add_Client', $data); // Render view and layout
    }

<<<<<<< HEAD
    public function verif_form_client() {
=======
    public function add_clientDossier()
    {
    }

    public function verif_form_client()
    {
>>>>>>> origin/Developpement
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
        } else {
            if ($this->mapclient->ajouter_client($_POST)) {
                // Client object now has an ID
            } else {
                header('Location:' . site_url("CI_client/consult_client"));
            }
        }
    }

    public function modif_client() {
        $data = array(); //Pour la vue
        $this->load->model('Mappage/client', 'mapclient'); //Chargement du modele
        $data['client'] = $this->mapclient->select_client($this->session->userdata('CI_client/modif_client'));
        $this->load->model('Mappage/user', 'user'); //Chargement du modele
        $users = $this->user->list_user(TRUE);
        foreach ($users as $user) {
            $data['users'][] = array('label' => $user['categorie_id'],
                'value' => $user['id'],
                'texte' => $user['prenom'] . ' ' . $user['nom']);
        }

        $respo = new User($data['client']['user_id']);

        $data['responsable'] = $respo->prenom . ' ' . $respo->nom;
        $this->form_validation->set_rules($this->configclient);

        if ($this->form_validation->run() == FALSE) {
            //Formualire invalide, retour à celui-ci

            $this->layout->title('Modifier un client');
            $this->layout->view('B2E/Client/Fiche_Client.php', $data); // Render view and layout
        } else {
            //Formulaire ok, traitement des données
            //Clean des données
            $this->form_validation->set_rules($this->configtraitementclient);
            $this->form_validation->run();
            if ($this->mapclient->modifier_client($_POST)) {
                header('Location:' . site_url("CI_client/consult_client"));
            } else {
                echo 'error';
            }
        }
    }

    public function ajax_supprimerclient() {
        $this->load->model('Mappage/client', 'mapclients'); //Chargement du modele
        $this->mapclients->supprimer_client($_POST['id']);
        header('Location:' . site_url("CI_client/consult_client"));
    }

    public function ajax_archiverclient() {
        $this->load->model('Mappage/client', 'mapclients'); //Chargement du modele
        $this->mapclients->archiverclient($_POST['id']);
        header('Location:' . site_url("CI_client/consult_client"));
    }

    public function ajax_activerclient() {
        $this->load->model('Mappage/client', 'mapclients'); //Chargement du modele
        $this->mapclients->activerclient($_POST['id']);
        header('Location:' . site_url("CI_client/consult_client"));
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
<<<<<<< HEAD
=======

>>>>>>> origin/Developpement
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
        ), array(
            'field' => 'prenom2',
            'label' => 'Prenom (Conjoint)',
            'rules' => 'xss_clean|htmlentities'
        ), array(
            'field' => 'adresse',
            'label' => 'Adresse',
            'rules' => 'xss_clean|htmlentities'
        ), array(
            'field' => 'ville',
            'label' => 'Ville',
            'rules' => 'xss_clean|htmlentities'
        ),
    );

<<<<<<< HEAD
    public function tel(&$nbr) {
=======
    public function tel(&$nbr)
    {
>>>>>>> origin/Developpement
        $nbr = preg_replace("#[^0-9]#", '', $nbr);

        if (strlen($nbr) == 10) {
            for ($i = 0; $i < 5; $i++) {
                $nbr_array[] = substr($nbr, $i * 2, 2);
            }
            $nbr = implode('.', $nbr_array);
            return TRUE;
        } elseif (strlen($nbr) == 0) {
            return TRUE;
        } else {

            $this->form_validation->set_message('tel', 'Le champs %s doit contenir 10 chiffres');
            return FALSE;
        }
    }

}
