<?php

class Client extends CI_Controller
{

    public function index()
    {
        echo 'Hello World!';

    }

    public function consult_client()
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
        $data['minilogonextwatt'] = img_url('mini-logo-nextwatt+baseline-fond-transparent.png');

        // Liens vers les fichiers javascripts
        $data['jquerymin'] = js_url('jquery.min');
        $data['jquery1xmin'] = js_url('jquery1x.min');
        $data['bootstrapmin'] = js_url('bootstrap.min');
        $data['aceelementsmin'] = js_url('ace-elements.min');
        $data['acemin'] = js_url('ace.min');

        // Charge la page
        $this->load->view('B2E/Client/Accueil_Client', $data);
    }

    public function add_client()
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
        $data['minilogonextwatt'] = img_url('mini-logo-nextwatt+baseline-fond-transparent.png');

        // Liens vers les fichiers javascripts
        $data['jquerymin'] = js_url('jquery.min');
        $data['jquery1xmin'] = js_url('jquery1x.min');
        $data['bootstrapmin'] = js_url('bootstrap.min');
        $data['aceelementsmin'] = js_url('ace-elements.min');
        $data['acemin'] = js_url('ace.min');

        // Charge la page
        $this->load->view('B2E/Client/Add_Client', $data);
    }

    public function verif_form_client()
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
        $data['jquerymin'] = js_url('jquery.min');
        $data['jquery1xmin'] = js_url('jquery1x.min');
        $data['bootstrapmin'] = js_url('bootstrap.min');
        $data['aceelementsmin'] = js_url('ace-elements.min');
        $data['acemin'] = js_url('ace.min');


            $config = array(
            array(
                'field' => 'nom1',
                'label' => 'Nom',
                'rules' => 'required'
            ),
            array(
                'field' => 'prenom1',
                'label' => 'Prenom',
                'rules' => 'required'
            ),
            array(
                'field' => 'nom2',
                'label' => 'Nom du conjoint',
            ),
            array(
                'field' => 'prenom2',
                'label' => 'Prenom du conjoint',
            ),
            array(
                'field' => 'adresse',
                'label' => 'Adresse',
            ),
            array(
                'field' => 'codepostal',
                'label' => 'Code Postal',
                'rules' => 'required'
            ),
            array(
                'field' => 'ville',
                'label' => 'Ville',
                'rules' => 'required'
            ),

            array(
                'field' => 'email',
                'label' => 'e-mail',
                'rules' => 'required|valid_email'
            ),
            array(
                'field' => 'tel1',
                'label' => 'Telephone fixe',
            ),
            array(
                'field' => 'tel2',
                'label' => 'Telephone portable',
            ),
            array(
                'field' => 'responsable',
                'label' => 'responsable',
            ),
        );

        $this->form_validation->set_rules($config);

        //Si le formulaire est mal remplit !
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('B2E/Client/Add_Client', $data);
        } else {
            $this->load->view('formsuccess');
        }


    }
}
