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

    public function showFormCap(){
        $temps = $this->modelt->getSeasons();
        return $this->view->showFormCap($temps);
    }
    
    public function showFormEditCap($id){
        $cap = $this->modelc->getCap($id);
        $temps = $this->modelt->getSeasons();
        return $this->view->showFormEditCap($temps,$cap);
    }

    public function addCap() {
        if (!isset($_POST['titulo']) || empty($_POST['titulo'])) {
            return $this->view->showFormCap('Falta completar el titulo');
        }
    
        if (!isset($_POST['descripcion']) || empty($_POST['descripcion'])) {
            return $this->view->showFormCap('Falta completar la descripción');
        }

        if (!isset($_POST['video']) || empty($_POST['video'])) {
            return $this->view->showFormCap('Falta completar el video');
        }
    
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $video = $_POST['video'];
        $temporada = $_POST['temporada'];
    
        $id = $this->modelc->addCap($titulo, $descripcion, $video, $temporada);

        header('Location: ' . BASE_URL . 'caps');
    }

    public function deleteCap($id){
        $caps = $this->modelc->getCaps();
        $temps = $this->modelt->getSeasons();
        $cap = $this->modelc->getCap($id);
        if (!$cap) {
            $this->view->showCaps($caps,$temps,'No existe el capitulo');
        }

        $this->modelc->deleteCap($id);
        header('Location: ' . BASE_URL . 'caps');
    }

    public function editCap($id){
        $cap = $this->modelc->getCap($id);
        $temps = $this->modelt->getSeasons();

        if (!isset($_POST['titulo']) || empty($_POST['titulo'])) {
            return $this->view->showFormEditCap($temps,$cap,'Falta completar el titulo');
        }
    
        if (!isset($_POST['descripcion']) || empty($_POST['descripcion'])) {
            return $this->view->showFormEditCap($temps,$cap,'Falta completar la descripción');
        }

        if (!isset($_POST['video']) || empty($_POST['video'])) {
            return $this->view->showFormEditCap($temps,$cap,'Falta completar el video');
        }
    
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $video = $_POST['video'];
        $temporada = $_POST['temporada'];
    
        $this->modelc->editCap($titulo, $descripcion, $video, $temporada,$id);

        header('Location: ' . BASE_URL . 'caps');
    } 

    public function showHome(){
        return $this->view->showHome();
    }

}

    
