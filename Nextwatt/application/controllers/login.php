<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function index()
    {

    }

    public function ajax_login()
    {
        if(isset($_POST['login']) && isset($_POST['password']))
        {
            $this->load->model('Mappage/user', 'mapuser');
            $retourmodel = $this->mapuser->verif_login();

            echo($retourmodel);
        }
    }
}