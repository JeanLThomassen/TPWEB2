<?php

require_once './app/models/model.php';
class SeasonModel extends Model{


    public function getSeasons(){
        $query = $this->db->prepare('SELECT * FROM temporada');
        $query->execute();

        $temps = $query->fetchAll(PDO::FETCH_OBJ);
        return $temps;
    }

    public function getSeason($id){
        $query = $this->db->prepare('SELECT * FROM temporada WHERE id_temporada = ?');
        $query->execute([$id]);

        $temp = $query->fetchAll(PDO::FETCH_OBJ);
        return $temp;
    }

    public function addSeason($nombre) { 
        $query = $this->db->prepare('INSERT INTO temporada(nombre) VALUES (?)');
        $query->execute([$nombre]);
    
        $id = $this->db->lastInsertId();
    
        return $id;
    }

    public function deleteSeason($id){
        $query = $this->db->prepare('DELETE FROM temporada WHERE id_temporada = ?');
        $query->execute([$id]);
    }

    public function editSeason($id,$nombre){
        $query = $this->db->prepare('UPDATE temporada SET nombre = ? WHERE id_temporada = ?');
        $query->execute([$nombre, $id]);
    }
}
