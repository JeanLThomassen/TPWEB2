<?php
require_once './app/models/model.php';
class AuthModel extends Model{

    public function getUserByName($name){
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE name = ?');
        $query->execute([$name]);
        
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }
}