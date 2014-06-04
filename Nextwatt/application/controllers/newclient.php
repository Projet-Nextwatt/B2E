<?php

class Newclient extends CI_Controller {

    public function index() {
        // Mise en place du formulaire d'inscription
        // Définition des champs de formulaire
        // Chargement du helper form
        $this->load->helper('form');
        $data = array(
            'identifiant' => array(
                'name' => 'identifiant',
                'id' => 'identifiant',
                'value' => '',
                'maxlength' => 50,
                'size' => 20
            ),
            'nom' => array(
                'name' => 'nom',
                'id' => 'nom',
                'value' => '',
                'maxlength' => 50,
                'size' => 20
            ),
            'email' => array(
                'name' => 'email',
                'id' => 'email',
                'value' => '',
                'maxlength' => 100,
                'size' => 40
            ),
            'password' => array(
                'name' => 'password',
                'id' => 'password',
                'value' => '',
                'maxlength' => 50,
                'size' => 20
            ),
        );
        // le premier paramètre permet au Framework de déterminer quel est le fichier contenu dans "/views" à charger. dans notre cas, inscription.php.
        // le second paramètre permet d'envoyer notre configuration de formulaire à la vue.
        $this->load->view('vueclient', $data);
    }

}
