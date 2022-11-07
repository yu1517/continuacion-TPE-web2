<?php

class AuthorModel {

    private $db;
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_tpe;charset=utf8' , 'root', '');
    }

    //Devuelve la lista de tareas completa
    function getAllAuthors(){

        //1. Abro la conexion
        //$db = $this->connect();

        //2.Enviar la consulta(2 sub pasos: prepare y execte)
        $query = $this->db->prepare("SELECT * FROM authors");
        $query->execute();

        //3. Obtengo la respuesta con un fetchAll(porque)
        $author = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos

        return $author;
    }

    public function getNameById($id){
        $query = $this->db->prepare("SELECT `name`FROM `authors` WHERE `id_author`= ?");
        $query->execute([$id]);
        $name = $query->fetch(PDO::FETCH_OBJ);
        return $name;
    }
    
    function getRegisterAuthorById($id){
        $query = $this->db->prepare("SELECT * FROM authors");
        $query->execute();
        $authorRegister = $query->fetchAll(PDO::FETCH_OBJ);
        return $authorRegister;
    }

    public function getRegisterAuthorById2($id){
        $query = $this->db->prepare("SELECT * FROM authors where `id_author`=$id");
        $query->execute();
        $authorRegister = $query->fetchAll(PDO::FETCH_OBJ);
        return $authorRegister;
    }

    function insertAuthor($name, $nationality, $birthdate) { 
        $query = $this->db->prepare("INSERT INTO authors (name,nationality, birthdate) VALUES (?, ?, ?)");
        $query->execute([$name, $nationality, $birthdate]);
        
        return $this->db->lastInsertId();
        header("Location: " . BASE_URL. 'author');
    }
    
    public function insertEditAuthor($name, $nationality, $birthdate, $id_author){

        $query = $this->db->prepare("UPDATE `authors` SET name=?, nationality=?, birthdate=? WHERE id_author=?");
        $query->execute([$name, $nationality, $birthdate, $id_author]);
        header("Location: " . BASE_URL. 'author');
}

    function deleteAuthorById($id){
        $query = $this->db->prepare('DELETE FROM authors WHERE id_author = ?');
        $query->execute([$id]);
        header("Location: " . BASE_URL. 'author');
    }
}