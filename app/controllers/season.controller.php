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

    public function showFormSeason(){
        return $this->view->showFormSeason();
    }
    
    public function addSeason() {
        if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
            return $this->view->showFormSeason('Falta completar el nombre');
        }
    
        $nombre = $_POST['nombre'];
    
        $id = $this->model->addSeason($nombre);
    
        // redirijo al home (también podriamos usar un método de una vista para motrar un mensaje de éxito)
        header('Location: ' . BASE_URL);
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