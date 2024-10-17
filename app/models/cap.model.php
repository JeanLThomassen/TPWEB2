<?php

class CapModel {
    private $db;
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=bdd-bajoterra;charset=utf8', 'root', '');
    }

    public function getCaps(){
        $query = $this->db->prepare('SELECT * FROM capitulos INNER JOIN temporada ON capitulos.temporada = temporada.id_temporada');
        $query->execute();

        $caps = $query->fetchAll(PDO::FETCH_OBJ);
        return $caps;
    }

    public function getCap($id){
        $query = $this->db->prepare('SELECT * FROM capitulos INNER JOIN temporada ON capitulos.temporada = temporada.id_temporada WHERE capitulos.id = ?');
        $query->execute([$id]);

        $cap = $query->fetchAll(PDO::FETCH_OBJ);
        return $cap;
    }

    public function addCap($titulo, $descripcion, $video, $temporada) { 
        $query = $this->db->prepare('INSERT INTO capitulos(titulo, descripcion, video, temporada) VALUES (?, ?, ?, ?)');
        $query->execute([$titulo, $descripcion, $video, $temporada]);
    
        $id = $this->db->lastInsertId();
    
        return $id;
    }

    public function deleteCap($id){
        $query = $this->db->prepare('DELETE FROM capitulos WHERE id = ?');
        $query->execute([$id]);
    }

    public function getCapXSeason($id){
        $query = $this->db->prepare('SELECT * FROM capitulos INNER JOIN temporada ON capitulos.temporada = temporada.id_temporada WHERE temporada = ?');
        $query->execute([$id]);

        $caps = $query->fetchAll(PDO::FETCH_OBJ);
        return $caps;
    }
}
