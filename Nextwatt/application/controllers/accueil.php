<?php

/**
 * Created by PhpStorm.
 * User: Kévin Nérino
 * Date: 06/06/14
 * Time: 15:20
 */
class Accueil extends MY_Controller
{
    // Layout used in this controller
    public $layout_view = 'B2E/layout/default';


    public function index()
    {
        $data = array();
        $data['minilogonextwatt'] = img_url('minilogonextwatt.png');

        $this->layout->title('Accueil B2E');
        $this->layout->view('B2E/Accueil', $data); // Render view and layout
    }
}