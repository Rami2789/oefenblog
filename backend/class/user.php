<?php

require_once "DbConfig.php";

class User extends DbConfig{
    public function create($data){
        try{
            if($data['password'] != $data['conf-password']){
                throw new Exception("Wachtwoorden komen niet overeen met elkaar.");
            }
            $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
            $encryptedPassword = password_hash($data['password'], PASSWORD_BCRYPT, ['cost' => 12]);
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":username", $data['username']);
            $stmt->bindParam(":password", $encryptedPassword);
            if(!$stmt->execute()){
                throw new Exception("Account kon niet aangemaakt worden");
            }
            header("Location: login.php");
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function login($data){
        try {
            $user = $this->getUser($data['username']);
            if (!$user) {
                throw new Exception('Gebruiker bestaat niet.');
            }
            if(!password_verify($data['password'], $user->password)){
                throw new Exception("wachtwoord is incorrect.");
            }
            session_start();
            $_SESSION['ingelogd'] = true;
            $_SESSION['username'] = $user->username;
            $_SESSION['id'] = $user->id;
            header("Location: backend/home.php");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getUser($username){
        $sql = "SELECT * FROM users WHERE username = :username AND deleted = 0";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function getUserId($id){
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function userUpdate($data){
        try{
            $sql = "UPDATE users SET username=:username, password=:password WHERE id= :id";
            $encryptedPassword = password_hash($data['password'], PASSWORD_BCRYPT, ['cost' => 12]);
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":username", $data['username']);
            $stmt->bindParam(":id", $data['id']);
            $stmt->bindParam(":password", $encryptedPassword);
            if(!$stmt->execute()){
                throw new Exception("Gegevens niet veranderd");
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function deleteUser($id) {
        try {
          $sql = "UPDATE users SET deleted = 1 WHERE id = :id";
          $stmt = $this->connect()->prepare($sql);
          $stmt->bindParam(":id",$id);
          $stmt->execute();
      }catch(Exception $e){
          echo $e->getMessage();
      }
      }
}


?>