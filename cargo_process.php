<?php

require_once("globals.php");
require_once("db.php");
require_once("models/func.php");
require_once("dao/funcDao.php");
require_once("models/message.php");

$message = new Message($BASE_URL);

$data = $_POST;

if(!empty($data)){


        //adicionando cargo
    if($data["type"] === "create"){

            $title = $data["title"];
            $id_cargo = $data["id_cargo"];
            $bio = $data["bio"];
        
            $querry = "INSERT INTO cargo (title, id_cargo, bio) VALUE (:title, :id_cargo, :bio)";
        
            $stmt = $conn->prepare($querry);
        
            $stmt->bindParam(":title", $title);
            $stmt->bindParam(":id_cargo", $id_cargo);
            $stmt->bindParam(":bio", $bio);
        
            $stmt->execute();

            $message->setMessage("Cargo adicionando com sucesso" , "success", "cargoshow.php");
        
        } elseif($data["type"] === "delete"){

            $id = $data["id"];

            $querry = "DELETE FROM cargo WHERE id = :id";

            $stmt = $conn->prepare($querry);

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            $message->setMessage("Removido com sucesso" , "success", "cargoshow.php");
        }
    
} 
$id;
    if(!empty($_GET)){
        $id = $_GET["id"];
    }
    // dados de um funcionario
    if(!empty($id)){

        $query = "SELECT * FROM cargo WHERE id = :id";
        $stmt = $conn->prepare($query);

        $stmt->bindParam("id", $id);

        $stmt->execute();

        $cargs = $stmt->fetch();

    } else {
        
        // selec de dados vindos do banco

        $carg = [];

        $querry = "SELECT * FROM cargo";

        $stmt = $conn->prepare($querry);

        $stmt->execute();

        $cargs = $stmt->fetchAll();
    }

