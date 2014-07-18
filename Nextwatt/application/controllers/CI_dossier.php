<?php
class CI_Dossier extends MY_Controller {

    public $layout_view = 'B2E/layout/default';

	public function index()
	{

	}

    public function choix_action(){
        $this->load->model('Mappage/dossier', 'dossier');

        $this->layout->title('Accueil B2E');
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
            $data['listeclient'] = $this->client->list_client(TRUE,array('id','nom1','prenom1'));
            $this->layout->js(js_url('dossier'));
            $this->layout->title('Ajouter un dossier');
            $this->layout->view('B2E/Dossier_Archives/Add_Dossier',$data);
        }
        public function select_dossier()
        {
            $dossier = new Dossier_model();
            $dossier->where('')->get();
            
            echo "ID dossier :".$dossier->id."<br/>Titre :".$dossier->Titre."<br/> montant :".$dossier->Montant."<br/><br/>";
        }

    public function ajax_addDossier(){
        if(isset($_POST['idClient']) && isset($_POST['nomClient']) && isset($_POST['prenomClient'])){
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
            $this->load->model('Mappage/Client','client');
            $this->client->link_ClientUser($this->session->userdata['userconnect']['id_login'],$_POST['idClient']);
            $this->dossier->add_Dossier($_POST['idClient']);

            echo true;

        }else {
            $message_403 = "Vous n'avez pas acc&egrave;s &agrave; cette URL.";
            show_error($message_403, 403, '403 - Acc&egrave;s interdit');
        }
    }
}


