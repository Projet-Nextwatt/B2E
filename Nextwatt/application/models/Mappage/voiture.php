<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Voiture extends DataMapper  {
    var $table = 'voitures';
    
    var $id;
    var $name;
    var $color;
    
    
    public function __construct() {
        parent::__construct();
    }
}