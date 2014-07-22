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
        $data = array();
        $data['minilogonextwatt'] = img_url('minilogonextwatt.png');

        $this->layout->title('Accueil B2E');

        // Charge la page
        $this->layout->view('B2E/Dossier_Archives/Accueil_Dossier_Archive', $data);
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
        $dossier = new Dossier_model();
        $dossier->where('')->get();

        echo "ID dossier :" . $dossier->id . "<br/>Titre :" . $dossier->Titre . "<br/> montant :" . $dossier->Montant . "<br/><br/>";
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

    public function devis_form()
    {
        $this->load->model('Mappage/client', 'client');
        $this->load->model('Mappage/user', 'user');

        $client = $this->client->select_client($this->session->userdata['idClient']);
        $user = $this->user->select_user($client['user_id']);

        $data['nomclient1'] = $client['nom1'];
        $data['prenomclient1'] = $client['prenom1'];
        $data['prenomclient2'] = $client['prenom2'];
        $data['adresse'] = $client['adresse'];
        $data['ville'] = $client['ville'];
        $data['usernom'] = $user['nom'];
        $data['userprenom'] = $user['prenom'];

        //Articles
        $data['article'] = $this->aff_Article();

        $tariftotal = null;
        foreach($data['article']->result() as $a){
            $tariftotal += $a->Prix_Annonce_TTC + $a->Prix_MO;
        }
        $data['tariftotal'] = $tariftotal;
        $data['tva'] = $tariftotal/(1+0.2)*0.2;
        $this->layout->title('Devis');
        $this->layout->view('B2E/Dossier_Archives/Devis/devis', $data);
    }

    public function aff_Article()
    {
        $this->load->model('Mappage/article', 'article');
        $result = $this->article->select_ArticleById();
        return $result;
    }
}


