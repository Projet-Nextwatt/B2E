<?php
//Controleur accueil
/**
 * Created by PhpStorm.
 * User: Kévin Nérino
 * Date: 06/06/14
 * Time: 15:20
 */
class Accueil extends MY_Controller
{
    // layout used in this controller
    public $layout_view = 'B2E/layout/default';


    public function index()
    {
        $this->layout->title('Accueil B2E');
        $this->layout->view('B2E/Accueil'); // Render view and layout
    }

    public function test()
    {
        $this->load->model('Mappage/client','c');

        $this->c->test();
    }

}

