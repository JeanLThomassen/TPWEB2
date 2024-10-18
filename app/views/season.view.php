<?php 

class SeasonView{

    private $user = null;
    public function __construct($user) {
        $this->user = $user;
    }
    
    public function showSeasons($temps){
        require 'templates/lista-temps.phtml';
    }

    public function showFormSeason($error=''){
        require_once 'templates/form-addseason.phtml';
    }

    public function showFormEditSeason($temps,$error=''){
        require_once 'templates/form-editseason.phtml';
    }
}