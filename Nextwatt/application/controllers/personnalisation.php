<?php

class Personnalisation extends MY_Controller
{
    public $layout_view = 'B2E/layout/default';

    public function index()
    {
        echo 'Hello World!';
    }

    public function accueil_perso()
    {
        $data = array();
        $data['minilogonextwatt'] = img_url('minilogonextwatt.png');

        $this->layout->title('Accueil B2E');

        // Charge la page
        $this->layout->view('B2E/Personnalisation/Menu_Personnalisation', $data);
    }
}
