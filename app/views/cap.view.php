<?php 

class CapView{
    private $user = null;
    public function __construct($user) {
        $this->user = $user;
    }
    public function showCaps($caps,$temps){
        require 'templates/lista-caps.phtml';
    }
    public function showCap($cap){
        require 'templates/cap.phtml';
    }
    public function showHome(){
        require 'templates/home.phtml';
    }
}