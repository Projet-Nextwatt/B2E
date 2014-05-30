<?php

class PV extends CI_Controller
{

    public function index()
    {
        $this->load->helper('url');
        $this->load->model('Mappage/ensoleillement', 'ensoleillement');

        $data = array();
        $ensoleillement = new ensoleillement();
        $data['ensoleillement'] = $this->ensoleillement->select_ensoleillement();
        $this->load->view('B2E/Etudes/Solaire/etudesolaire', $data);
    }
}

