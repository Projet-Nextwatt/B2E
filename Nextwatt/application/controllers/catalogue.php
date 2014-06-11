<?php

class Catalogue extends MY_Controller
{
    // Layout used in this controller
    public $layout_view = 'B2E/layout/default';

    public function index()
    {
        $data = array();
        $data['minilogonextwatt'] = img_url('minilogonextwatt.png');

        $this->layout->title('Catalogue B2E');
        $this->layout->view('B2E/Catalogue/Consulter_Catalogue', $data);
    }

    public function consult_catalogue()
    {
        $data = array();
        $data['minilogonextwatt'] = img_url('minilogonextwatt.png');

        $this->layout->title('Catalogue B2E');
        $this->load->view('B2E/Catalogue/Consulter_Catalogue', $data);
    }

}
