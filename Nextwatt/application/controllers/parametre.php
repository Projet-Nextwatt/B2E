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

        $config = array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ),
            array(
                'field' => 'passconf',
                'label' => 'Password Confirmation',
                'rules' => 'required'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE) {

            $this->layout->title('Ajouter une energie');
            $this->layout->view('B2E/Parametre/add_energie.php', $data); // Render view and layout
        } else {

            $this->layout->title('Reussi ajouter une energie');
            $this->layout->view('B2E/Parametre/add_energie_success.php', $data); // Render view and layout
        }
    }

}
