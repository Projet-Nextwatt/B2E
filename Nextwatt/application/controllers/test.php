<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Test extends CI_Controller {

    public function index() {
        $this->load->helper('url');
        $this->load->helper('assets_helper');

        $data = array();
        $data['jquery'] = js_url('jquery.min');
        $data['bootsrap'] = js_url('bootsrap');
        $data['bootsrap.min'] = js_url('bootsrap.min');
        $data['bootsrap.min'] = css_url('bootsrap.min');
        $this->load->view('test', $data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */