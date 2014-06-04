<?php
class Client extends CI_Controller {

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
            $data['jquerymin']= js_url('jquery.min');
            $data['jquery1xmin']= js_url('jquery1x.min');
            $data['bootstrapmin']= js_url('bootstrap.min');
            $data['aceelementsmin']= js_url('ace-elements.min');
            $data['acemin']= js_url('ace.min');

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
            $data['jquerymin']= js_url('jquery.min');
            $data['jquery1xmin']= js_url('jquery1x.min');
            $data['bootstrapmin']= js_url('bootstrap.min');
            $data['aceelementsmin']= js_url('ace-elements.min');
            $data['acemin']= js_url('ace.min');

            // Charge la page
            $this->load->view('B2E/Client/Add_Client', $data);
        }

    public function verif_form_client()
    {

        $config = array(
            array(
                'field'   => 'identifiant',
                'label'   => 'Identifiant',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'mdp',
                'label'   => 'Mot de Passe',
                'rules'   => 'required|matches[confmdp]'
            ),
            array(
                'field'   => 'confmdp',
                'label'   => 'Confirmation mot de passe',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'prenom',
                'label'   => 'Prenom',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'nom',
                'label'   => 'Nom',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'email',
                'label'   => 'E-mail',
                'rules'   => 'required|valid_email'
            ),
            array(
                'field'   => 'tel',
                'label'   => 'Telephone',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'categorie',
                'label'   => 'Categorie',
                'rules'   => 'required'
            ),

        );

        $this->form_validation->set_rules($config);



        if ($this->form_validation->run() == FALSE)
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

            // On charge la page
            $this->load->view('B2E/Client/Add_Client');
        }
        else
        {
            $this->load->view('formsuccess');
        }


    }
}
