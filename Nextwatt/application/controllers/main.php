<?php
class Main extends CI_Controller {
    // layout used in this controller
    public $layout_view = 'layout/default';

    public function index() {

        $data = array();

        $this->load->library('layout');          // Load layout library

        $this->layout->title('Site index page'); // Set page title
        $this->layout->js('assets/js/ace.min.js', 'assets/js/ace.sidebar.js', 'assets/js/ace-elements.min.js', 'assets/js/bootstrap.min.js',
        'assets/js/excanvas.min.js', 'assets/js/jquery.min.js', 'assets/js/jquery1x.min.js');
        $this->layout->css('assets/css/ace.min.css','assets/css/ace-fonts.css', 'assets/css/ace-ie.min.css','assets/css/ace-part2.min.css',
            'assets/css/ace-rtl.min.css', 'assets/css/ace-skins.min.css', 'assets/css/bootstrap.min.css', 'assets/css/font-awesome.min.css');
        $this->layout->view('index', $data);     // Render view and layout
    }
}