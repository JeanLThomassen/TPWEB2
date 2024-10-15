<?php

class CharModel {
    private $db;
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=bdd-bajoterra;charset=utf8', 'root', '');
    }
    public function getChars(){
        $query = $this->db->prepare('SELECT * FROM personajes');
        $query->execute();

        $caps = $query->fetchAll(PDO::FETCH_OBJ);
        return $caps;
    }

    public function getChar($id){
        $query = $this->db->prepare('SELECT * FROM personajes WHERE id = ?');
        $query->execute([$id]);

        $char = $query->fetchAll(PDO::FETCH_OBJ);
        return $char;
    }
}