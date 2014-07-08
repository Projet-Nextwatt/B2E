<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Test extends MY_Controller
{
    // layout used in this controller
    public $layout_view = 'B2E/layout/default';

    public function index()
    {

    }

    public function test_catalogue()
    {
        $this->layout->title('TEST CATALOGUE SHANY');
        $this->layout->view('Essais/test'); //render view and layout
    }

    public function test_modal()
    {
        $this->layout->title('TEST CATALOGUE SHANY');
        $this->layout->view('B2E/Success_Error/Confirmation'); //render view and layout
    }


}

/* End of file welcome.php */
