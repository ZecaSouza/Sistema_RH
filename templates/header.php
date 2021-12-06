<?php

    require_once("globals.php");
    require_once("db.php");
    require_once("models/message.php");
    require_once("dao/UserDao.php");
    require_once("dao/funcDao.php");

    $message = new Message($BASE_URL);

    $flassMenssage = $message->getMessage();
    
    if(!empty($flassMenssage["msg"])) {
      // Limpar mensagem
      $message->clearMessage();
    }

    $UserDao = new UserDao($conn, $BASE_URL);

    $userData = $UserDao->verifyToken(false);
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.css" integrity="sha512-Ty5JVU2Gi9x9IdqyHN0ykhPakXQuXgGY5ZzmhgZJapf3CpmQgbuhGxmI4tsc8YaXM+kibfrZ+CNX4fur14XNRg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--CSS My-->
    <link rel="stylesheet" href="css/styles.css">
    <!-- Google JS 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="enviar/cad.js"></script> -->
    <script src="enviar/jquery.js"></script>
    <title>Sistema de Funcionarios</title>
</head>
<body>
    <header>
        <nav id="main-navbar" class="navbar navbar-expand-lg">
            <a href="<?= $BASE_URL ?>home.php" class="navbar-brand"><i class="far fa-address-book"></i>
                <span id="pro1">Home</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggler="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="navigation">
                <i class="fas fa-bars"></i>
            </button>
            <form action="" method="GET" id="search-form" class="form-inline my-2 my-lg-0">
                 <input type="text" name="q" id="search" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="search">
                 <button class="btn my2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
            </form>
             <div class="collapse navbar-collapse" id="navbar">
                 <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="<?= $BASE_URL ?>cargoshow.php" class="nav-link">Cargos/Funçoes</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $BASE_URL ?>create_func.php" class="nav-link">Cadastro de Funcionarios</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $BASE_URL ?>editprofile.php" class="nav-link bold">Editar</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $BASE_URL ?>logout.php" class="nav-link">Sair</a>
                    </li>
                 </ul>
            </div>
        </nav>
    </header>


    
<?php if(!empty($flassMenssage["msg"])): ?>
    <div class="msg-container">
        <p class="msg" <?= $flassMenssage["type"] ?>> <?= $flassMenssage["msg"] ?></p>
    </div>
<?php endif; ?>  
    


    <!-- usar codigo para conteudo site
        <div id="main-container" class="container-fluid">
        <h1>Corpo</h1>
    </div>-->