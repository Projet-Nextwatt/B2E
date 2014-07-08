<?php

class Login extends CI_Controller
{

    public function index()
    {
        $data = array();

        // Liens vers les fichiers javascripts
        $data['jquerymin'] = js_url('jquery.min');
        $data['bootstrapmin'] = js_url('bootstrap.min');
        $data['acemin'] = js_url('ace.min');
        $data['aceelementsmin'] = js_url('ace-elements.min');
        $data['login'] = js_url('login');


        // Liens vers les fichiers CSS
        $data['bootstrapmincss'] = css_url('bootstrap.min');
        $data['acefonts'] = css_url('ace-fonts');
        $data['acemincss'] = css_url('ace.min');
        $data['acertl'] = css_url('ace-rtl.min');
        $data['aceskins'] = css_url('ace-skins.min');

        // Liens vers les fichiers images
        $data['minilogonextwatt'] = img_url('MiniLogoNextwatt.png');
        $data['blur'] = img_url('blurNextwatt.png');

        // Charge la page
        $this->load->view('B2E/Login', $data);
    }



    public function ajax_login()
    {
        if(isset($_POST['login']) && isset($_POST['password']))
        {
            $data['login'] = $_POST['login'];
            $data['mdp'] = $_POST['password'];
            $this->load->model('Mappage/user', 'mapuser');
            $retourmodel = $this->mapuser->verif_login($data);

            echo($retourmodel);
        }
    }
}