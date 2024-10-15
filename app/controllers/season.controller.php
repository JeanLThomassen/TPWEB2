<?php

require_once ('./app/models/season.model.php');
require_once ('./app/views/season.view.php');

class SeasonController {
    private $model;
    private $view;

    public function __construct($res){
        $this->model = new SeasonModel();
        $this->view = new SeasonView($res->user);
    }

    public function showSeasons(){
        $temps = $this->model->getSeasons();
        return $this->view->showSeasons($temps);
    }
    public function deleteSeason($id){
        $season = $this->model->getSeason($id);
        if (!$season) {
            // mostrar error
        }

        $this->model->deleteSeason($id);
        header('Location: ' . BASE_URL);
    }
}