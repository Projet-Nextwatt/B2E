<?php

class form extends CI_Controller {

    function index()
    {
        $config = array(
            array(
                'field'   => 'username',
                'label'   => 'Username',
                'rules'   => 'required|min_length[5]|max_length[15]'
            ),
            array(
                'field'   => 'password',
                'label'   => 'Password',
                'rules'   => 'required|matches[passconf]'
            ),
            array(
                'field'   => 'passconf',
                'label'   => 'Password Confirmation',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'email',
                'label'   => 'Email',
                'rules'   => 'required|valid_email'
            )
        );

        $this->form_validation->set_rules($config);


        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('myform');
        }
        else
        {
            $this->load->view('formsuccess');
        }
    }
}
