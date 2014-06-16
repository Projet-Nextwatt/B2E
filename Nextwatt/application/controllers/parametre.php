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

    
    
    public function add_energie() {
        $data = array();

        $this->form_validation->set_rules('Energie', 'Energie', 'required|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('Prix', 'Prix', 'required|numeric');
        $this->form_validation->set_rules('Inflation', 'Inflation', 'required|numeric');
        $this->form_validation->set_rules('Abonnement', 'Abonement', 'numeric');
        $this->form_validation->set_rules('CO2', 'C02', 'required|numeric');


        if ($this->form_validation->run() == FALSE) {

            $this->layout->title('Ajouter une energie');
            $this->layout->view('B2E/Parametre/add_energie.php', $data); // Render view and layout
        } else {
            
            
            $this->form_validation->set_rules('Energie', 'Energie', 'xss_clean|prep_for_form|htmlentities');
            $this->form_validation->run();
            $this->layout->title('Reussi ajouter une energie');
            $this->layout->view('B2E/Parametre/add_energie_success.php', $data); // Render view and layout
        }
    }
}

