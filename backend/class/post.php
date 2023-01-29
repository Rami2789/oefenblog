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


    public function getPostFromUser($author){
        $sql = "SELECT * FROM posts WHERE author = :author AND deleted = 0";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":author", $author);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getPostID($postID){
        $sql = "SELECT * FROM posts
                JOIN users ON users.id = posts.author
                WHERE posts.id = :postID";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":postID", $postID);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function postUpdate($data, $id){
        try{
            $sql = "UPDATE posts SET  title=:title, description=:description, body=:body WHERE id= :id";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":title", $data['title']);
            $stmt->bindParam(":description", $data['description']);
            $stmt->bindParam(":body", $data['body']);
            $stmt->bindParam(":id", $id);
            session_start();
            if(!$stmt->execute()){
                throw new Exception("Gegevens niet veranderd");
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }




}