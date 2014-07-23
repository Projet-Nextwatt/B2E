<?php

class CI_Dossier extends MY_Controller
{

    public $layout_view = 'B2E/layout/default';

    public function index()
    {

    }

    public function choix_action()
    {
        $this->layout->title('Dossier');
        $this->layout->view('B2E/Dossier_Archives/Dossier/choix_action_dossier');
    }

    public function consult_dossier()
    {
        $this->load->model('Mappage/dossier','dossier');

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
        $DossierID = $this->session->userdata('CI_Dossier/select_dossier');
        $this->session->set_userdata('idDossier', $DossierID);

        $this->choix_action();
    }

    public function addDossier()
    {
            $this->load->model('Mappage/Dossier', 'dossier');
            $resultSelectIdDossier = $this->dossier->select_idDossier();
            $iddossier = $resultSelectIdDossier[0]['id'] + 1;
            $tabsession = array(
                'idDossier' => $iddossier,
                'idClient' => $_POST['idClient'],
                'nomClient' => $_POST['nomClient'],
                'prenomClient' => $_POST['prenomClient']
            );
            $this->session->set_userdata($tabsession);
            $this->load->model('Mappage/Client', 'client');
            $this->client->link_ClientUser($this->session->userdata['userconnect']['id_login'], $_POST['idClient']);
            $this->dossier->add_Dossier($_POST['idClient']);

            $this->choix_action();
    }

    public function archiver()
    {
        $this->load->model('Mappage/dossier', 'dossier');
        $this->load->model('Mappage/article', 'article');

        $this->article->archiver_dossier($this->session->userdata('idDossier'));
        $this->dossier->archiver_dossier($this->session->userdata('idDossier'));
    }
}


