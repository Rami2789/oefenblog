<?php

require_once "DbConfig.php";

class Post extends DbConfig{

    public function create($data){
        // session_start();
        $author = $_SESSION['id'];

        try{
            $sql = "INSERT INTO posts (title, description, body, author) VALUES (:title, :description, :body, :auth)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":title", $data['title']);
            $stmt->bindParam(":description", $data['description']);
            $stmt->bindParam(":body", $data['body']);
            $stmt->bindParam(":auth", $author);
            if(!$stmt->execute()){
                throw new Exception("Post kon niet aangemaakt worden");
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }


    public function getPost(){
        $sql = "SELECT * FROM posts WHERE deleted = 0";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


    public function getPostFromUser($id){
        $sql = "SELECT * FROM posts WHERE author = :author AND deleted = 0";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":author", $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }




}