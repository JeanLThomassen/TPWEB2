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

    public function addChar($nombre, $descripcion, $imagen) { 
        $query = $this->db->prepare('INSERT INTO personajes(nombre, descripcion, imagen) VALUES (?, ?, ?)');
        $query->execute([$nombre, $descripcion, $imagen]);
    
        $id = $this->db->lastInsertId();
    
        return $id;
    }

    public function deleteChar($id){
        $query = $this->db->prepare('DELETE FROM personajes WHERE id = ?');
        $query->execute([$id]);
    }
}