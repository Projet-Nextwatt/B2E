<?php

class Voiture extends DataMapper  {
    var $table = 'voitures';
    
    var $id;
    var $name;
    var $color;
    
    
    public function __construct() {
        parent::__construct();
    }
}