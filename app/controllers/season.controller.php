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

    public function showFormEditSeason($id){
        $temps = $this->model->getSeason($id);
        return $this->view->showFormEditSeason($temps);
    }
    
    public function addSeason() {
        if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
            return $this->view->showFormSeason('Falta completar el nombre');
        }
    
        $nombre = $_POST['nombre'];
    
        $id = $this->model->addSeason($nombre);
    
        header('Location: ' . BASE_URL . 'seasons');
    }
    public function deleteSeason($id){
        $season = $this->model->getSeason($id);
        if (!$season) {
            return $this->view->showFormEditSeason('No existe la temporada');
        }
        $this->model->deleteSeason($id);
        header('Location: ' . BASE_URL . 'seasons');
    }

    public function editSeason($id){
        $temps = $this->model->getSeason($id);
        if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
            return $this->view->showFormEditSeason($temps,'Falta completar el nombre');
        }
    
        $nombre = $_POST['nombre'];

        $this->model->editSeason($id,$nombre);
    
        header('Location: ' . BASE_URL . 'seasons');
    }
}