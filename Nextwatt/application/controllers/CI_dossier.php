<?php

class CI_Dossier extends MY_Controller
{

    public $layout_view = 'B2E/layout/default';

    /*
    public function choix_action() //NOUVEAU DOSSiER
    {
        $this->load->model('Mappage/client', 'client');
        $this->load->model('Mappage/user', 'user');                                             // On load les modèles "client", "user" et "dossier" afin de les utiliser plus tard
        $this->load->model('Mappage/dossier', 'dossier');

        $idDossier = $this->session->userdata['idDossier'];                                     // On s'assure que les variables sessions 'idDossier' et 'CI_dossier/select_dossier'
        $this->session->set_userdata('CI_dossier/select_dossier', $idDossier);                  // soient bien les mêmes en les "interchangeant !

        $dossier = $this->dossier->select_dossier($idDossier);
        $client = $this->client->select_client($dossier[0]['client_id']);                       //Suite d'appels/contre appels de requetes pour récupérer les informations dossier
        $this->session->set_userdata('idClient', $dossier[0]['client_id']);                     //clients et user grâce aux informations en session et au models "client", "user" et "dossier".
        $user = $this->user->select_user($client['user_id']);

        $data['nomclient1'] = $client['nom1'];
        $data['prenomclient1'] = $client['prenom1'];
        $data['prenomclient2'] = $client['prenom2'];
        $data['adresse'] = $client['adresse'];                                                  //Récupération des informations clients
        $data['ville'] = $client['ville'];
        $data['tel'] = $client['tel1'];
        $data['usernom'] = $user['nom'];
        $data['userprenom'] = $user['prenom'];

        $this->layout->title('Dossier');
        $this->layout->view('B2E/Dossier_Archives/Dossier/choix_action_dossier', $data);        //Redirection vers la vue avec les informations nécessaires dans la variable $data
    }
    */

    public function consult_dossier()
    {
        $this->load->model('Mappage/dossier', 'dossier');
        $this->load->model('Mappage/client', 'client');                                         // On load les modèles "client" et "dossier" afin de les utiliser plus tard

        // Mise en forme dossier archive ----------------------
        $dossiersarchive = $this->dossier->select_archive_dossier();                            // On récupère les dossiers archivés
        $newDossierArchive = array();
        $identifiant = null;
        foreach ($dossiersarchive as $d) {
            $newDossierArchive[$d['Identifiant']][] = array('nom1' => $d['nom1'], 'titre' => $d['titre'], 'montant' => $d['montant'], 'idDossier' => $d['id']);     //Mise en forme avec les informations nécessaires pour la vue
        }
        //---------------------------------------------

        // Mise en forme dossier ----------------------
        $dossiers = $this->dossier->select_all_dossier();                                       // On récupère les dossiers non archivés
        $newDossier = array();
        $identifiant = null;
        foreach ($dossiers as $d) {
            $newDossier[$d['Identifiant']][] = array('nom1'=>$d['nom1'],'titre'=>$d['titre'],'montant'=>$d['montant'],'idDossier'=>$d['id']);           //Mise en forme avec les informations nécessaires pour la vue
        }
        //---------------------------------------------

        $data['dossiers'] = $newDossier;                                                        // On met les résultats dans la variable $data pour pouvoir l'utiliser dans la vue
        $data['dossiers_archive'] = $newDossierArchive;

        $this->layout->js(js_url('dossier'));
        $this->layout->title('Dossier');
        $this->layout->view('B2E/Dossier_Archives/Dossier/Consulter_Dossier', $data);
    }

    public function select_dossier()
    {
        $idDossier = $this->session->userdata['CI_dossier/select_dossier'];

        //reset de la session
        $array_items = $this->session->all_userdata();
        unset($array_items['session_id']);
        unset($array_items['ip_address']);
        unset($array_items['user_agent']);
        unset($array_items['last_activity']);
        unset($array_items['user_data']);
        unset($array_items['userconnect']);
        unset($array_items['CI_dossier/select_dossier']);
        $this->session->unset_userdata($array_items);


        $this->load->model('Mappage/dossier', 'dossier');
        $this->load->model('Mappage/client', 'client');             // On load les modèles afin de les utiliser plus tard
        $this->load->model('Mappage/user', 'user');
        $this->load->model('Mappage/etude', 'etude');
        $data['dossier'] = $this->dossier->select_dossier($idDossier);
        $data['client'] = $this->client->select_client($data['dossier']['client_id']);
        $this->session->set_userdata('idClient', $data['dossier']['client_id']);


        $this->layout->title('Dossier');
        $this->layout->view('B2E/Dossier_Archives/Dossier/choix_action_dossier', $data);        // On redirige vers la vue !
    }

    public function nouveau_dossier(){
        $this->load->model('Mappage/Dossier', 'dossier');           // Load du model dossier
        $idclient=$this->session->userdata['CI_dossier/nouveau_dossier'];
        $iddossier=$this->dossier->add_Dossier($idclient);

        $tabsession = array('CI_dossier/select_dossier' => $iddossier);
        $this->session->set_userdata($tabsession);
        header('Location:' . site_url('CI_dossier/select_dossier'));
    }

    /*
    public function add_dossier()
    {
        $data = array();
        $this->load->model('Mappage/client', 'client');     // On load les modèles afin de les utiliser plus tard
        $data['listeclient'] = $this->client->list_client(TRUE, array('id', 'nom1', 'prenom1'));        // On va récuperer les clients
        $this->layout->js(js_url('dossier'));
        $this->layout->title('Ajouter un dossier');
        $this->layout->view('B2E/Dossier_Archives/Add_Dossier', $data);                         // On redirige vers la vue !
    }
*/

/*
    public function addDossier()
    {
        $this->load->model('Mappage/Dossier', 'dossier');           // Load du model dossier

        $resultSelectIdDossier = $this->dossier->select_idDossier();    // On va chercher le dernier id_dossier dans la bdd
        $iddossier = $resultSelectIdDossier[0]['id'] + 1;
        if (isset($_POST['idClient']) && isset($_POST['nomClient']) && isset($_POST['prenomClient'])) {
            $tabsession = array(
                'idDossier' => $iddossier,
                'idClient' => $_POST['idClient'],
                'nomClient' => $_POST['nomClient'],
                'prenomClient' => $_POST['prenomClient']
            );
            $this->session->set_userdata($tabsession);          // Si les informations du client sont dans le post, on remplit la session avec les infos client
        }

        $this->load->model('Mappage/Client', 'client');         // Load du model client
        $this->client->link_ClientUser($this->session->userdata['userconnect']['id_login'], $this->session->userdata['idClient']);
        $this->dossier->add_Dossier($this->session->userdata['idClient']);                        // On ajoute l'id du user connecté au client selectionné puis on ajoute un dossier avec l'idClient pour lier le dossier au client

        $this->choix_action();
    }
*/

    public function archiver()
    {
        $this->load->model('Mappage/dossier', 'dossier');
        $this->load->model('Mappage/article', 'article');               // Load des models


        $this->article->archiver_article($this->session->userdata('CI_Dossier/select_dossier'));        // Appel des fonctions qui vont bien pour l'archivage du dossier et des articles liés au dossier
        $this->dossier->archiver_dossier($this->session->userdata('CI_Dossier/select_dossier'));
    }

    /******************************************* DETAIL ARTICLE  *******************************************/

    public function aff_detail_article($id=null )
    {
        if ($id!=null){
            $this->session->set_userdata(array('CI_dossier/aff_detail_article'=>$id));
            header('Location:' . site_url("CI_dossier/aff_detail_article"));                // On met l'id de l'article selectionné en session puis on redirige vers le detail de l'article
        }
        $this->layout->title('Dossier');
        $this->layout->view('B2E/Dossier_Archives/Devis/detail_article');
    }

    public function ajax_selectdossier(){
        if(isset($_POST['idDossier'])){
            $this->session->set_userdata(array('CI_dossier/select_dossier' => $_POST['idDossier']));    // On met l'id du dossier en session s'il est dans le $_POST
            echo true;
        }
    }

}


