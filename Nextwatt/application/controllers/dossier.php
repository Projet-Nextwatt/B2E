<?php
class Dossier extends MY_Controller {

    public $layout_view = 'B2E/layout/default';

	public function index()
	{
        $data = array();
        $data['minilogonextwatt'] = img_url('minilogonextwatt.png');

        $this->layout->title('Accueil B2E');

        // Charge la page
        $this->layout->view('B2E/Dossier_Archives/Dossier/choix_action_dossier', $data);
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
            $dossier = new Dossier_model();
            $dossier->Titre = "Mon premier Dossier";
            $dossier->Montant = "2250,51";
            
            $dossier->save();
            
        }
        public function select_dossier()
        {
            $dossier = new Dossier_model();
            $dossier->where('')->get();
            
            echo "ID dossier :".$dossier->id."<br/>Titre :".$dossier->Titre."<br/> montant :".$dossier->Montant."<br/><br/>";
        }
}


