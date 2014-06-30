<?php

class MY_Controller extends CI_Controller
{
// Site global layout
    public $layout_view = 'B2E/layout/default';

    function __construct()
    {
        parent::__construct();

// Site global resources
        $this->load->library('layout');
        //Charge le CSS, JS et Images du layout.

        //JS
        $this->layout->js(js_url('jquery.min'));
//        $this->layout->js(js_url('jquery1x.min')); Fichier pour IE
        $this->layout->js(js_url('bootstrap.min'));
        $this->layout->js(js_url('ace.min'));
        $this->layout->js(js_url('ace-elements.min'));


        //CSS
        $this->layout->css(css_url('bootstrap.min'));
        $this->layout->css(css_url('ace-fonts'));
        $this->layout->css(css_url('ace.min'));
//        $this->layout->css(css_url('ace-part2.min')); Fichier pour IE
        $this->layout->css(css_url('ace-rtl.min'));
//        $this->layout->css(css_url('ace-ie.min')); Fichier pour IE
        $this->layout->css(css_url('ace-skins.min'));

        //Image
        $this->layout->image(img_url('minilogonextwatt.png'));
        $this->layout->image(img_url('feuillenextwatt.png'));
    }
}

