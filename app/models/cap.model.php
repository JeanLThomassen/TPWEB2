<?php

require_once './app/models/model.php';
class CapModel extends Model{

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

    public function editCap($titulo,$descripcion,$video,$temporada,$id){
        $query = $this->db->prepare('UPDATE capitulos SET titulo = ?,  descripcion = ?, video = ?, temporada = ? WHERE id = ?');
        $query->execute([$titulo, $descripcion, $video, $temporada, $id]);
    }

    public function getCapXSeason($id){
        $query = $this->db->prepare('SELECT * FROM capitulos INNER JOIN temporada ON capitulos.temporada = temporada.id_temporada WHERE temporada = ?');
        $query->execute([$id]);

        $caps = $query->fetchAll(PDO::FETCH_OBJ);
        return $caps;
    }
}
