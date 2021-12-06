<?php

    require_once("globals.php");
    require_once("db.php");
    require_once("models/func.php");
    require_once("dao/funcDao.php");

    $message = new Message($BASE_URL);
    $funcDao = new funcDAO($conn, $BASE_URL);

    
     // Resgata o tipo do formulário
    $type = filter_input(INPUT_POST, "type");

    if($type === "create"){

        // recebendo dados do form
        $nome_func = filter_input(INPUT_POST, "nome_func");
        $cpf = filter_input(INPUT_POST, "cpf");
        $cargo = filter_input(INPUT_POST, "cargo");
        $dataCon = filter_input(INPUT_POST, "dataCon");
        $id_func = filter_input(INPUT_POST, "id_func");

        $func = new func();

        $funcDao->create($func);


    }else if ($type === "delete"){
        // Recebe os dados do form
       
    }

    $id;
    if(!empty($_GET)){
        $id = $_GET["id"];
    }
    // dados de um funcionario
    if(!empty($id)){

        $query = "SELECT * FROM func WHERE id = :id";
        $stmt = $conn->prepare($query);

        $stmt->bindParam("id", $id);

        $stmt->execute();

        $funcs = $stmt->fetch();

    } else {
        
        // selec de dados vindos do banco

        $func = [];

        $querry = "SELECT * FROM func";

        $stmt = $conn->prepare($querry);

        $stmt->execute();

        $funcs = $stmt->fetchAll();
    }
