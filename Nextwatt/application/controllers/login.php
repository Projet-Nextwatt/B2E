<?php

session_start();

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
        if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['rememberme'])) {

            $data['login'] = htmlspecialchars(trim($_POST['login']));
            $data['mdp'] = sha1(htmlspecialchars(trim($_POST['password'])));
            $this->load->model('Mappage/user', 'mapuser');
            $retourmodel = $this->mapuser->verif_login($data);
            if ($retourmodel == '1') {
                if ($_POST['rememberme'] == 'true') {
                    $this->config->set_item('sess_expire_on_close', '0'); // do change session config
                }
            }

            $this->mapuser->derniereconnexion($data['login']);

            if ($retourmodel == 1) {
                $this->login_ok($_POST['login']);
            }
            echo($retourmodel);
        }
    }

    private function login_ok($login){
        $this->load->model('Mappage/user', 'mapuser');
        $this->load->model('Mappage/categorie', 'categorie');
        $user = $this->mapuser->select_user_by_login($login);
        $sacategorie = $this->categorie->select_categorie($user['categorie_id']);
        $sess_array = array(
            'id_login' => $user['id'],
            'login'=>$_POST['login'],
            'nom' => $user['nom'],
            'prenom' => $user['prenom'],
            'Droit_SUDO' => $sacategorie['Droit_SUDO'],
            'Droit_Admin' => $sacategorie['Droit_Admin'],
            'Droit_Catalogue' => $sacategorie['Droit_Catalogue'],
            'Droit_Edit_Devis' => $sacategorie['Droit_Edit_Devis'],
        );
        $this->session->set_userdata('userconnect', $sess_array);
    }

    public function deconnexion()
    {
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }

}