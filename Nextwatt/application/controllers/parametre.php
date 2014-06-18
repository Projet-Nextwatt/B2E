<?php

//Controleur accueil
/**
 * Created by PhpStorm.
 * User: Kévin Nérino
 * Date: 06/06/14
 * Time: 15:20
 */
class Parametre extends MY_Controller {

    // layout used in this controller
    public $layout_view = 'B2E/layout/default';

    public function index() {
        $data = array();
        $data['minilogonextwatt'] = img_url('minilogonextwatt.png');

        $this->layout->title('Parametres');
        $this->layout->view('B2E/Parametre/choix_parametre', $data); // Render view and layout
    }

    public function consulter_energie() {
        $energies = new Prixenergie();
        $energies->get();
        $energies = $energies->all_to_array();

        $data = array();

        $data['energies'] = $energies;
        $data['eneteteEnergies'] = array('Id', 'Nom', 'Prix du kWh', 'Inflation', 'Pollution CO<sub>2</sub>', 'Abonnement');
        $this->layout->title('Liste des énergies');
        $this->layout->view('B2E/Parametre/Consulter_Energie.php', $data); // Render view and layout
    }

    public function add_energie() {
        $data = array();

        //Validation du formualire
        $this->form_validation->set_rules('Energie', 'Energie', 'required|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('Prix', 'Prix', 'required|numeric');
        $this->form_validation->set_rules('Inflation', 'Inflation', 'required|numeric');
        $this->form_validation->set_rules('Abonnement', 'Abonement', 'numeric');
        $this->form_validation->set_rules('CO2', 'C02', 'required|numeric');


        if ($this->form_validation->run() == FALSE) {
            //Formualire invalide, retour à celui-ci
            $this->layout->title('Ajouter une energie');
            $this->layout->view('B2E/Parametre/add_energie.php', $data); // Render view and layout
        } else {

            //Formulaire ok, traitement des données
            //Clean des données
            $this->form_validation->set_rules('Energie', 'Energie', 'xss_clean|prep_for_form|htmlentities');
            $this->form_validation->run();

            $Energie = new Prixenergie();

            foreach ($_POST as $variable => $valeur) {
                //if (isset($Energie->$variable)) { Ce test ne fonctionne pas, mais ne faudrait il pas passer par des set?? ***************************
                $Energie->$variable = $valeur;
                //}
            }

            /*
              $Energie->Energie = $_POST['Energie'];
              $Energie->Prix = $_POST['Prix'];
              $Energie->Inflation = $_POST['Inflation'];
              $Energie->Abonnement = $_POST['Abonnement'];
              $Energie->CO2 = $_POST['CO2'];
             */

            if ($Energie->save()) {
                // Energie object now has an ID

                $energies = new Prixenergie();
                $energies->get();
                $energies = $energies->all_to_array();

                $data = array();

                $data['energies'] = $energies;
                $data['eneteteEnergies'] = array('Id', 'Nom', 'Prix du kWh', 'Inflation', 'Pollution CO<sub>2</sub>', 'Abonnement');
                $this->layout->title('Liste des énergies');
                $this->layout->view('B2E/Parametre/Consulter_Energie.php', $data); // Render view and layout
            } else {

                /*                                     //Comment j'envoi le tableau à la vue? -********************************************************
                  foreach ($u->error->all as $error) {
                  echo $error;
                  }
                 * 
                 * 
                 */

                //$data['error']=$error;
                $this->layout->title('Erreur');
                $this->layout->view('B2E/Parametre/add_energie.php', $data); // Render view and layout
            }
        }
    }

}
