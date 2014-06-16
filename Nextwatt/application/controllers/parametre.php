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

        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[1]|max_length[12]|xss_clean|callback_username_check');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]|md5');
        $this->form_validation->set_rules('passconf', 'Password Confirm', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        $this->form_validation->set_message('required', 'le champs %s est requis   banane');

        if ($this->form_validation->run() == FALSE) {

            $this->layout->title('Ajouter une energie');
            $this->layout->view('B2E/Parametre/add_energie.php', $data); // Render view and layout
        } else {
            $this->layout->title('Reussi ajouter une energie');
            $this->layout->view('B2E/Parametre/add_energie_success.php', $data); // Render view and layout
        }
    }
    
    
    

    public function username_check($str) {
        if ($str == 'test') {
            $this->form_validation->set_message('username_check', 'The %s field can not be the word "test"');
            return FALSE;
        } else {
            return TRUE;
        }
    }

}

