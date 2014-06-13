<?php
//Controleur accueil
/**
 * Created by PhpStorm.
 * User: Kévin Nérino
 * Date: 06/06/14
 * Time: 15:20
 */
class Parametre extends MY_Controller
{
    // layout used in this controller
    public $layout_view = 'B2E/layout/default';


    public function index()
    {
        $data = array();
        $data['minilogonextwatt'] = img_url('minilogonextwatt.png');

        $this->layout->title('Parametres');
        $this->layout->view('B2E/Accueil', $data); // Render view and layout
    }
    
        public function ma_methode()
    {
        $data = array();
        $data['minilogonextwatt'] = img_url('minilogonextwatt.png');

        $this->layout->title('Parametres');
        $this->layout->view('B2E/Parametre/vue.php', $data); // Render view and layout
    }
}

