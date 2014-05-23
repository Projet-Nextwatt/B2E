<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Test extends CI_Controller {

    public function index() {
        $this->load->helper('url');
        $this->load->helper('assets_helper');

        $data = array();
        $data['jquery'] = js_url('jquery.min');
        $data['bootstrap'] = js_url('bootstrap');
        $data['bootstrapcss'] = css_url('bootstrap');
        $data['simplesidebar'] = css_url('simple-sidebar');
        $data['minilogonextwatt'] = img_url('MiniLogoNextwatt.png');
        //$this->load->view('test', $data);
        $this->load->view('theme/sidebar', $data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */