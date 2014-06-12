<?php
$this->config =  array(
    'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/files/",
    'upload_url'      => base_url()."files/",
    'allowed_types'   => "gif|jpg|png|jpeg|pdf|doc|xml",
    'overwrite'       => TRUE,
    'max_size'        => "1000KB",
    'max_height'      => "768",
    'max_width'       => "1024"
);