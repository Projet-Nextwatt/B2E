<?php

//Controleur acetheme

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Acetheme extends CI_Controller
{

    public function index()
    {
        $this->load->helper('url');
        $this->load->helper('assets_helper');

        $data = array();

        $data['acertl'] = css_url('ace-rtl.min');
        $data['OpenSans'] = css_url('OpenSans');
        $data['aceskins'] = css_url('ace-skins.min');
        $data['acemin'] = css_url('ace.min');
        $data['acebootstrap'] = css_url('acebootstrap');
        $data['nextwattico'] = img_url('Mininextwatt.png');
        //$this->load->view('test', $data);
        $this->load->view('theme/sidebar', $data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
