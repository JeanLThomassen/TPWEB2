<?php 

class CapView{
    private $user = null;
    public function __construct($user) {
        $this->user = $user;
    }
    public function showCaps($caps,$temps,$error=''){
        require 'templates/lista-caps.phtml';
    }
    public function showCap($cap){
        require 'templates/cap.phtml';
    }
    public function showHome(){
        require 'templates/home.phtml';
    }
    public function showFormCap($temps,$error=''){
        require_once 'templates/form-addcap.phtml';
    }
    public function showFormEditCap($temps,$cap,$error=''){
        require_once 'templates/form-editcap.phtml';
    }
}