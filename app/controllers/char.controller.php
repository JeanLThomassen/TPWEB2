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
}