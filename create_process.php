<?php

include_once("db.php");
include_once("globals.php");
require_once("models/message.php");

$message = new Message($BASE_URL);

$data = $_POST;

if(!empty($data)){


    
    //Adicionando funcionario
    if($data["type"] === "create"){
        
        $nome_func = $data["nome_func"];
        $cpf = $data["cpf"];
        $cargo = $data["cargo"];
        $dataCon = $data["dataCon"];
        $id_func = $data["id_func"];

        $querry = "INSERT INTO func (nome_func, cpf, cargo, dataCon, id_func) VALUES (:nome_func, :cpf, :cargo, :dataCon, :id_func)";

        $stmt = $conn->prepare($querry);

        $stmt->bindParam(":nome_func", $nome_func);
        $stmt->bindParam(":cpf", $cpf);
        $stmt->bindParam(":cargo", $cargo);
        $stmt->bindParam(":dataCon", $dataCon);
        $stmt->bindParam(":id_func", $id_func);

        $stmt->execute();


    } elseif($data["type"] === "delete") {
    
        $id = $data["id"];
    
        $querry = "DELETE FROM func WHERE id = :id";
    
        $stmt = $conn->prepare($querry);
    
        $stmt->bindParam(":id", $id);
    
        $stmt->execute();
    
        $message->setMessage("Removido com sucesso" , "success", "home.php");
    
    }
}

$conn = null;



