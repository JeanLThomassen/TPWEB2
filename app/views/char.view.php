<?php 

class CharView{

    private $user = null;
    public function __construct($user) {
        $this->user = $user;
    }
    
    public function showChars($chars){
        require 'templates/lista-char.phtml';
    }
    public function showChar($char){
        require 'templates/char.phtml';
    }
}