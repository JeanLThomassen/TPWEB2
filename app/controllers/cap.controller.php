<?php

require_once ('./app/models/cap.model.php');
require_once ('./app/models/season.model.php');
require_once ('./app/views/cap.view.php');


class CapController {
    private $modelc;
    private $modelt;
    private $view;

    public function __construct($res){
        $this->modelc = new CapModel();
        $this->modelt = new SeasonModel();
        $this->view = new Capview($res->user);
    }

    public function showCaps(){
        $caps = $this->modelc->getCaps();
        $temps = $this->modelt->getSeasons();
        return $this->view->showCaps($caps,$temps);
    }

    public function showCap($id){
        $cap = $this->modelc->getCap($id);
        return $this->view->showCap($cap);
    }

    public function showCapsXSeason($id){
        $caps = $this->modelc->getCapXSeason($id);
        $temps = $this->modelt->getSeasons();
        return $this->view->showCaps($caps,$temps);
    }

    public function showHome(){
        return $this->view->showHome();
    }
}