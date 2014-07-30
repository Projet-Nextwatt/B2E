<?php

class CI_Dossier extends MY_Controller
{

    public $layout_view = 'B2E/layout/default';

    public function index()
    {

    }

    public function choix_action() //NOUVEAU DOSSER
    {
        $this->load->model('Mappage/client', 'client');
        $this->load->model('Mappage/user', 'user');
        $this->load->model('Mappage/dossier', 'dossier');

        $idDossier = $this->session->userdata['idDossier'];
        $this->session->set_userdata('CI_dossier/select_dossier', $idDossier);

        $dossier = $this->dossier->select_dossier($idDossier);
        $client = $this->client->select_client($dossier[0]['client_id']);
        $this->session->set_userdata('idClient', $dossier[0]['client_id']);
        $user = $this->user->select_user($client['user_id']);

        $data['nomclient1'] = $client['nom1'];
        $data['prenomclient1'] = $client['prenom1'];
        $data['prenomclient2'] = $client['prenom2'];
        $data['adresse'] = $client['adresse'];
        $data['ville'] = $client['ville'];
        $data['tel'] = $client['tel1'];
        $data['usernom'] = $user['nom'];
        $data['userprenom'] = $user['prenom'];

        $this->layout->title('Dossier');
        $this->layout->view('B2E/Dossier_Archives/Dossier/choix_action_dossier', $data);
    }

    public function consult_dossier()
    {
        $this->load->model('Mappage/dossier', 'dossier');

        $data['dossiers'] = $this->dossier->select_all_dossier();
        $data['dossiers_archive'] = $this->dossier->select_archive_dossier();

        $this->layout->title('Dossier');
        $this->layout->view('B2E/Dossier_Archives/Dossier/Consulter_Dossier', $data);
    }

    public function add_dossier()
    {
        $data = array();
        $this->load->model('Mappage/client', 'client');
        $data['listeclient'] = $this->client->list_client(TRUE, array('id', 'nom1', 'prenom1'));
        $this->layout->js(js_url('dossier'));
        $this->layout->title('Ajouter un dossier');
        $this->layout->view('B2E/Dossier_Archives/Add_Dossier', $data);
    }

    public function select_dossier()
    {
        $this->load->model('Mappage/dossier', 'dossier');
        $this->load->model('Mappage/client', 'client'); //DOSSIER EXISTANT
        $this->load->model('Mappage/user', 'user');

        $idDossier = $this->session->userdata['CI_dossier/select_dossier'];
        $this->session->set_userdata('idDossier', $idDossier);
        $dossier = $this->dossier->select_dossier($this->session->userdata['CI_dossier/select_dossier']);
        $client = $this->client->select_client($dossier[0]['client_id']);
        $this->session->set_userdata('idClient', $dossier[0]['client_id']);
        $user = $this->user->select_user($client['user_id']);

        $data['nomclient1'] = $client['nom1'];
        $data['prenomclient1'] = $client['prenom1'];
        $data['prenomclient2'] = $client['prenom2'];
        $data['adresse'] = $client['adresse'];
        $data['ville'] = $client['ville'];
        $data['tel'] = $client['tel1'];
        $data['usernom'] = $user['nom'];
        $data['userprenom'] = $user['prenom'];

        if ($dossier[0]['etude_id'] == 0) {
            $this->session->userdata['HEPP'] = null;
            $this->session->userdata['Ratioc'] = null;
            $this->session->userdata['ID_Ensoleillement'] = null;
            $this->session->userdata['Ville'] = null;
            $this->session->userdata['Heppnet'] = null;
            $this->session->userdata['Raccordement'] = null;
            $this->session->userdata['Production'] = null;
            $this->session->userdata['Panneau'] = null;
            $this->session->userdata['MarquePanneau'] = null;
            $this->session->userdata['PrixPanneau'] = null;
            $this->session->userdata['Inflation'] = null;
            $this->session->userdata['Tarifedf'] = null;
            $this->session->userdata['Orientation'] = null;
        } else {

        }

        $this->layout->title('Dossier');
        $this->layout->view('B2E/Dossier_Archives/Dossier/choix_action_dossier', $data);
    }

    public function addDossier()
    {
        $this->load->model('Mappage/Dossier', 'dossier');
        $resultSelectIdDossier = $this->dossier->select_idDossier();
        $iddossier = $resultSelectIdDossier[0]['id'] + 1;
        if (isset($_POST['idClient']) && isset($_POST['nomClient']) && isset($_POST['prenomClient'])) {
            $tabsession = array(
                'idDossier' => $iddossier,
                'idClient' => $_POST['idClient'],
                'nomClient' => $_POST['nomClient'],
                'prenomClient' => $_POST['prenomClient']
            );
            $this->session->set_userdata($tabsession);
        }

        $this->load->model('Mappage/Client', 'client');
        $this->client->link_ClientUser($this->session->userdata['userconnect']['id_login'], $this->session->userdata['idClient']);
        $this->dossier->add_Dossier($this->session->userdata['idClient']);

        $this->choix_action();
    }

    public function archiver()
    {
        $this->load->model('Mappage/dossier', 'dossier');
        $this->load->model('Mappage/article', 'article');

        $this->article->archiver_article($this->session->userdata('CI_Dossier/select_dossier'));
        $this->dossier->archiver_dossier($this->session->userdata('CI_Dossier/select_dossier'));
    }

    /******************************************* DETAIL ARTICLE  *******************************************/

    public function aff_detail_article()
    {
        $this->layout->title('Dossier');
        $this->layout->view('B2E/Dossier_Archives/Devis/detail_article');
    }

}


