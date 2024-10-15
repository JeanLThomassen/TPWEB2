<?php

class AuthModel{
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=bdd-bajoterra;charset=utf8', 'root', '');
    }

    public function getUserByName($name){
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE name = ?');
        $query->execute([$name]);
        
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }
}