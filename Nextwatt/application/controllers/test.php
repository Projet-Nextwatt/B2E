
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
        $this->load->view('B2E/Accueil', $data);
    }

    public function layout_sidebar()
    {
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
        $data['minilogonextwatt'] = img_url('mini-logo-nextwatt+baseline-fond-transparent.png');

        // Liens vers les fichiers javascripts
        $data['jquerymin']= js_url('jquery.min');
        $data['jquery1xmin']= js_url('jquery1x.min');
        $data['bootstrapmin']= js_url('bootstrap.min');
        $data['aceelementsmin']= js_url('ace-elements.min');
        $data['acemin']= js_url('ace.min');

        // Charge la page
        $this->load->view('layout/sidebar', $data);
    }

    public function layout_header()
    {
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
        $data['minilogonextwatt'] = img_url('mini-logo-nextwatt+baseline-fond-transparent.png');

        // Liens vers les fichiers javascripts
        $data['jquerymin']= js_url('jquery.min');
        $data['jquery1xmin']= js_url('jquery1x.min');
        $data['bootstrapmin']= js_url('bootstrap.min');
        $data['aceelementsmin']= js_url('ace-elements.min');
        $data['acemin']= js_url('ace.min');

        // Charge la page
        $this->load->view('layout/header', $data);

    }

    public function layout_core()
    {
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
        $data['minilogonextwatt'] = img_url('mini-logo-nextwatt+baseline-fond-transparent.png');

        // Liens vers les fichiers javascripts
        $data['jquerymin']= js_url('jquery.min');
        $data['jquery1xmin']= js_url('jquery1x.min');
        $data['bootstrapmin']= js_url('bootstrap.min');
        $data['aceelementsmin']= js_url('ace-elements.min');
        $data['acemin']= js_url('ace.min');

        // Charge la page
        $this->load->view('layout/test_integration', $data);

    }

    public function integration_layout()
    {
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
        $data['minilogonextwatt'] = img_url('mini-logo-nextwatt+baseline-fond-transparent.png');

        // Liens vers les fichiers javascripts
        $data['jquerymin']= js_url('jquery.min');
        $data['jquery1xmin']= js_url('jquery1x.min');
        $data['bootstrapmin']= js_url('bootstrap.min');
        $data['aceelementsmin']= js_url('ace-elements.min');
        $data['acemin']= js_url('ace.min');

        // Charge la page
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/header', $data);
        $this->load->view('layout/test_integration', $data);

    }
    public function upload()
    {
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
        $data['minilogonextwatt'] = img_url('mini-logo-nextwatt+baseline-fond-transparent.png');

        // Liens vers les fichiers javascripts
        $data['jquerymin']= js_url('jquery.min');
        $data['jquery1xmin']= js_url('jquery1x.min');
        $data['bootstrapmin']= js_url('bootstrap.min');
        $data['aceelementsmin']= js_url('ace-elements.min');
        $data['acemin']= js_url('ace.min');

        //load the helper
        $this->load->helper('form');

        //Configure
        //set the path where the files uploaded will be copied. NOTE if using linux, set the folder to permission 777
        $config['upload_path'] = 'application/views/uploads/';

        // set the filter image types
        $config['allowed_types'] = 'gif|jpg|png';

        //load the Essais library
        $this->load->library('Essais', $config);

        $this->upload->initialize($config);

        $this->upload->set_allowed_types('*');

        $data['upload_data'] = '';

        //if not successful, set the error message
        if (!$this->upload->do_upload('userfile')) {
            $data = array('msg' => $this->upload->display_errors());

        } else { //else, set the success message
            $data = array('msg' => "Upload success!");

            $data['upload_data'] = $this->upload->data();

        }

        //load the view/Essais.php
        $this->load->view('Essais', $data);

        // Charge la page
        $this->load->view('Essais', $data);

    }

}

/* End of file welcome.php */
