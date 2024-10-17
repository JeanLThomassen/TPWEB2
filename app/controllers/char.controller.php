<?php

require_once ('./app/models/char.model.php');
require_once ('./app/views/char.view.php');

class CharController {
    private $model;
    private $view;

    public function __construct($res){
        $this->model = new CharModel();
        $this->view = new Charview($res->user);
    }

    public function showChars(){
        $chars = $this->model->getChars();
        return $this->view->showChars($chars);
    }
    public function showChar($id){
        $char = $this->model->getChar($id);
        return $this->view->showChar($char);

    }

    public function showFormChar(){
         $this->view->showFormChar();
         echo 'hola';
         return;
    }

    public function addChar() {
        if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
            return $this->view->showFormChar('Falta completar el nombre');
        }
    
        if (!isset($_POST['descripcion']) || empty($_POST['descripcion'])) {
            return $this->view->showFormChar('Falta completar la descripción');
        }

        if (!isset($_POST['imagen']) || empty($_POST['imagen'])) {
            return $this->view->showFormChar('Falta completar la imagen');
        }
    
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $imagen = $_POST['imagen'];
    
        $id = $this->model->addChar($nombre, $descripcion, $imagen);
    
        // redirijo al home (también podriamos usar un método de una vista para motrar un mensaje de éxito)
        header('Location: ' . BASE_URL);
    }

    public function deleteChar($id){
        $char = $this->model->getChar($id);
        if (!$char) {
            $this->view->showChars($char,'No existe el capitulo');
        }

        $this->model->deleteChar($id);
        header('Location: ' . BASE_URL);
    }
}