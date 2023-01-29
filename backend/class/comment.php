<?php

require_once "DbConfig.php";

class Comment extends DbConfig{

public function commentToevoegen(){
        try{
            $sql = "INSERT INTO comments (message, author, post_id) VALUES (:message,:author, :post_id)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":message", $data['message']);
            $stmt->bindParam(":author", $data['author']);
            $stmt->bindParam(":post_id", $data['post_id']);
            if(!$stmt->execute()){
                throw new Exception("comment kon niet geplaatst worden");
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
}


}
?>