<?php 

class CharView{

    private $user = null;
    public function __construct($user) {
        $this->user = $user;
    }
    
    public function showChars($chars,$error=''){
        require 'templates/lista-char.phtml';
    }
    public function showChar($char){
        require 'templates/char.phtml';
    }
    public function showFormChar($error=''){
        require_once 'templates/form-addchar.phtml';
    }

    public function showFormEditChar($char,$error=''){
        require_once 'templates/form-editchar.phtml';
    }
}