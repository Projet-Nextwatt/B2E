<?php

class Upload extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    function index()
    {
        $this->layout->view('Essais', array('error' => ''));
    }

    function uploadfile()
    {
//        $folder = "./assets/uploads/";

        $config['upload_path'] = base_url().'/uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width'] = '2024';
        $config['max_height'] = '1428';

        $this->upload->initialize($config);
        $this->load->library('Essais', $config);

        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            $this->layout->view('Essais', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $this->layout->view('uploadsuccess', $data);
        }
    }
}