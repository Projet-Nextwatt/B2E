<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Test extends CI_Controller
{

    public function index()
    {
        $this->load->helper('url');
        $this->load->helper('assets_helper');

        $data = array();
//        $data['jquery'] = js_url('jquery.min');
        $data['jquery'] = 'http://localhost/B2E/Nextwatt/application/helpers/assets/javascript/jquery.min.js';
        $data['zeptomin'] = js_url('zepto.min');
        $data['hammermin'] = js_url('hammer.min');
        $data['zeptofx'] = js_url('zepto.fx');
        $data['sidebar'] = js_url('sidebar');
        $data['simplesidebar'] = css_url('simple-sidebar');
        $data['minilogonextwatt'] = img_url('logonextwatt.gif');
        //$this->load->view('test', $data);
        $this->load->view('theme/sidebar', $data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */