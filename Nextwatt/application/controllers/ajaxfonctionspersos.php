<?php

//Controleur accueil
/**
 * Created by PhpStorm.
 * User: Kévin Nérino
 * Date: 06/06/14
 * Time: 15:20
 */
class Ajaxfonctionspersos extends MY_Controller {


    public function sessionpourform(){
        
        $tabsession = array('form' => $_POST['id']);
        $this->session->set_userdata($tabsession);
    }
}
