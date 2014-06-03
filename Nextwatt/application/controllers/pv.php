<?php

class PV extends CI_Controller
{

    public function index()
    {
        $this->load->helper('url');
        $this->load->helper('assets_helper');
        $this->load->model('Mappage/ensoleillement', 'ensoleillement');

        $data = array();

        //Javascript
        $data['jquerymin']= js_url('jquery.min');

        //Image
        $data['tablorientation']= img_url('Tableau-orientation.png');
        $data['quinze']= img_url('15.png');
        $data['vingt']= img_url('20.png');
        $data['trente']= img_url('30.png');
        $data['quarantecinq']= img_url('45.png');
        $data['soixante']= img_url('60.png');

        $data['station'] = $this->ensoleillement->select_ensoleillement();
        $this->load->view('B2E/Etudes/Solaire/etudesolaire', $data);
    }
}

