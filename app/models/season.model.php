<?php

class SeasonModel
{
    private $db;
    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=bdd-bajoterra;charset=utf8', 'root', '');
    }
    public function getSeasons()
    {
        $query = $this->db->prepare('SELECT * FROM temporada');
        $query->execute();

        $temps = $query->fetchAll(PDO::FETCH_OBJ);
        return $temps;
    }

    public function getSeason($id)
    {
        $query = $this->db->prepare('SELECT * FROM temporada WHERE id = ?');
        $query->execute([$id]);

        $temp = $query->fetchAll(PDO::FETCH_OBJ);
        return $temp;
    }

    public function deleteSeason($id)
    {
        $query = $this->db->prepare('DELETE FROM temporada WHERE id = ?');
        $query->execute([$id]);
    }
}
