<?php

class UserModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_tpe;charset=utf8' , 'root', '');
    }

    public function getUserByEmail($email) {
        $query = $this->db->prepare("SELECT * FROM user WHERE email = ?");
        $query->execute([$email]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
        
    }
}