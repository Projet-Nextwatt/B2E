<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Test extends MY_Controller
{
    // layout used in this controller
    public $layout_view = 'B2E/layout/default';

    public function index()
    {

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
        $data['jquerymin'] = js_url('jquery.min');
        $data['jquery1xmin'] = js_url('jquery1x.min');
        $data['bootstrapmin'] = js_url('bootstrap.min');
        $data['aceelementsmin'] = js_url('ace-elements.min');
        $data['acemin'] = js_url('ace.min');

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
        $data['jquerymin'] = js_url('jquery.min');
        $data['jquery1xmin'] = js_url('jquery1x.min');
        $data['bootstrapmin'] = js_url('bootstrap.min');
        $data['aceelementsmin'] = js_url('ace-elements.min');
        $data['acemin'] = js_url('ace.min');

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
        $data['jquerymin'] = js_url('jquery.min');
        $data['jquery1xmin'] = js_url('jquery1x.min');
        $data['bootstrapmin'] = js_url('bootstrap.min');
        $data['aceelementsmin'] = js_url('ace-elements.min');
        $data['acemin'] = js_url('ace.min');

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
        $data['jquerymin'] = js_url('jquery.min');
        $data['jquery1xmin'] = js_url('jquery1x.min');
        $data['bootstrapmin'] = js_url('bootstrap.min');
        $data['aceelementsmin'] = js_url('ace-elements.min');
        $data['acemin'] = js_url('ace.min');

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
        $data['jquerymin'] = js_url('jquery.min');
        $data['jquery1xmin'] = js_url('jquery1x.min');
        $data['bootstrapmin'] = js_url('bootstrap.min');
        $data['aceelementsmin'] = js_url('ace-elements.min');
        $data['acemin'] = js_url('ace.min');

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

    public function test_catalogue()
    {
        $this->layout->title('TEST CATALOGUE SHANY');
        $this->layout->view('Essais/test'); //render view and layout
    }

    public function upload_catalogue_form()
    {
        $this->layout->title('TEST UPLOAD SHANY');
        $this->layout->view('Essais/upload'); //render view and layout
    }

    public function upload_catalogue_action()
    {
        $dossier = 'upload/';
        $fichier = basename($_FILES['userfile']['name']);
        $extensions = array('.txt');
        $extension = strrchr($_FILES['userfile']['name'], '.');
        //Début des vérifications de sécurité...
        if (!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
        {
            $erreur = 'Vous devez uploader un fichier de type txt ';
        }
        if (!isset($erreur)) //S'il n'y a pas d'erreur, on upload
        {
            //On formate le nom du fichier ici...
            $fichier = strtr($fichier,
                'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
            $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
            if (move_uploaded_file($_FILES['userfile']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
            {
                $this->layout->title('TEST UPLOAD SHANY');
                $this->layout->view('Essais/upload'); //render view and layout
                echo 'Upload effectué avec succès !';
            } else //Sinon (la fonction renvoie FALSE).
            {
                $this->layout->title('TEST UPLOAD SHANY');
                $this->layout->view('Essais/test'); //render view and layout
                echo 'Echec de l\'upload !';
            }
        } else {
            echo $erreur;
        }
    }

    public function aff_bdd()
    {
        //Remplissage de la variable $data avec l'image pour le layout
        $data = array();
        $data['minilogonextwatt'] = img_url('minilogonextwatt.png');
        //Chargement du titre et de la page avec la librairie "Layout" pour l'appliquer sur ladite page
        $this->layout->title('Catalogue B2E');
        $this->layout->view('Essais/catalogue_test', $data);
    }
}

/* End of file welcome.php */
