<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function index()
    {
        $this->load->helper('url');
        $this->load->helper('assets_helper');

        $data = array();

        // Liens vers les fichiers CSS
        $data['bootstrapmincss'] = css_url('bootstrap.min');
        $data['acefonts'] = css_url('ace-fonts');
        $data['acemincss'] = css_url('ace.min');
        $data['acepart2'] = css_url('ace-part2.min');
        $data['acertl'] = css_url('ace-rtl.min');
        $data['aceie'] = css_url('ace-ie.min');
        $data['aceskins'] = css_url('ace-skins.min');

        // Liens vers les fichiers images
        $data['minilogonextwatt'] = img_url('minilogonextwatt.png');

        // Liens vers les fichiers javascripts
        $data['jquerymin']= js_url('jquery.min');
        $data['jquery1xmin']= js_url('jquery1x.min');
        $data['bootstrapmin']= js_url('bootstrap.min');
        $data['aceelementsmin']= js_url('ace-elements.min');
        $data['acemin']= js_url('ace.min');

        // Charge la page
        $this->load->view('B2E/Login', $data);
    }

}