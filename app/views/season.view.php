<?php 

class SeasonView{

    private $user = null;
    public function __construct($user) {
        $this->user = $user;
    }
    
    public function showSeasons($temps){
        require 'templates/lista-temps.phtml';
    }
}