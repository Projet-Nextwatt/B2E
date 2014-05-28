<?php
class Dossier extends CI_Controller {

	public function index()
	{
		echo 'Hello World!';
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


