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
    //Configuration des règles par champs
    public $configValidationAddEnergie = array(
        array(
            'field' => 'Energie',
            'label' => 'Energie',
            'rules' => 'required|trim|min_length[1]|max_length[255]'
        ),
        array(
            'field' => 'Prix',
            'label' => 'Prix',
            'rules' => 'required|trim|numeric'
        ),
        array(
            'field' => 'Inflation',
            'label' => 'Inflation',
            'rules' => 'required|trim|numeric'
        ),
        array(
            'field' => 'Abonnement',
            'label' => 'Abonnement',
            'rules' => 'trim|numeric'
        ),
        array(
            'field' => 'CO2',
            'label' => 'CO2',
            'rules' => 'required|trim|numeric'
        ),
    );

    public $configTraitementAddEnergie = array(
        array(
            'field' => 'Energie',
            'label' => 'Energie',
            'rules' => 'xss_clean|htmlentities|htmlspecialchars_decode'
            //htmlspecialchars_decode($str, ENT_NOQUOTES); Comment je fait pour mettre un flag
),
    );

    public function index() {
        $data = array();
        $data['minilogonextwatt'] = img_url('minilogonextwatt.png');

        $this->layout->title('Parametres');
        $this->layout->view('B2E/Parametre/choix_parametre', $data); // Render view and layout
    }

    public function consulter_energie() {
        $this->load->model('Mappage/prixenergie', 'prixenergie'); //Chargement du model
        $data = array();

        $data['energies'] = $this->prixenergie->select_prixenergie();
        $data['eneteteEnergies'] = array('Id', 'Nom', 'Prix du kWh', 'Inflation', 'Pollution CO<sub>2</sub>', 'Abonnement');
        
        
        $this->layout->title('Liste des énergies');
        $this->layout->view('B2E/Parametre/Consulter_Energie.php', $data); // Render view and layout
    }

    public function add_energie() {
        $this->load->model('Mappage/prixenergie', 'prixenergie'); //Chargement du modele
        $data = array(); //Pour la vue

        $this->form_validation->set_rules($this->configValidationAddEnergie);

        if ($this->form_validation->run() == FALSE) {
            //Formualire invalide, retour à celui-ci
            $this->layout->title('Ajouter une energie');
            $this->layout->view('B2E/Parametre/Add_Energie.php', $data); // Render view and layout
        } else {
            //Formulaire ok, traitement des données
            //Clean des données
            $this->form_validation->set_rules($this->configTraitementAddEnergie);
            $this->form_validation->run();

            if ($this->prixenergie->ajouter_prixenergie($_POST)) {
                    // Energie object now has an ID
                header('Location:'.site_url("parametre/consulter_energie"));
            } else {
                /*    //Comment j'envoi le tableau à la vue? -********************************************************
                  foreach ($u->error->all as $error) {
                  echo $error;
                  }
                 */

                //$data['error']=$error;
                $this->layout->title('Erreur');
                $this->layout->view('B2E/Parametre/Add_Energie.php', $data); // Render view and layout
            }
        }
    }

    public function modif_energie() {
        $this->load->model('Mappage/prixenergie', 'prixenergie'); //Chargement du modele
        $data = array(); //Pour la vue
        $data['energie']  = $this->prixenergie->select_prixenergie($this->session->userdata('parametre/modif_energie'));
        


        $this->form_validation->set_rules($this->configValidationAddEnergie);

        if ($this->form_validation->run() == FALSE) {
            //Formualire invalide, retour à celui-ci            

            $this->layout->title('Moifier une énergie');
            $this->layout->view('B2E/Parametre/Add_Energie.php', $data); // Render view and layout
        } else {
            //Formulaire ok, traitement des données
            //Clean des données
            $this->form_validation->set_rules($this->configTraitementAddEnergie);
            $this->form_validation->run();
            if ($this->prixenergie->modifier_prixenergie($_POST)) {
                header('Location:'.site_url("parametre/consulter_energie"));
            } else {
                echo 'error';
            }
        }
    }
    
    
    public function ajax_supprimerenergie(){
        $this->load->model('Mappage/prixenergie', 'prixenergie'); //Chargement du modele
        $this->prixenergie->supprimer_prixenergie($_POST['id']);
    }
}
