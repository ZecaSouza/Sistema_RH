<?php

require_once("globals.php");
require_once("db.php");
require_once("models/message.php");

$message = new Message($BASE_URL);

$flassMenssage = $message->getMessage();

if(!empty($flassMenssage["msg"])) {
  // Limpar mensagem
  $message->clearMessage();
}

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
    <!-- Google JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Sistema de Funcionarios</title>
</head>
<?php if(!empty($flassMenssage["msg"])): ?>
        <div class="msg-container">
            <p class="msg bold" <?= $flassMenssage["type"] ?>> <?= $flassMenssage["msg"] ?></p>
        </div>
    <?php endif; ?>  
<body>
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Cadastro</h2>
              <p class="text-white-50 mb-5">Insira seus dados:</p>
                <form id="form-cad" action="auth_process.php" method="post">
                  <input type="hidden" id="type" name="type" value="register">
                    <div class="form-outline form-white mb-4">
                        <label class="form-label" for="name">Nome</label>
                        <input type="text" id="name" name="name" class="form-control form-control-lg" placeholder="Nome" maxlength="50" required />
                    </div>
                    <div class="form-outline form-white mb-4">
                        <label class="form-label" for="lastname">Sobrenome</label>
                        <input type="text" id="lastname" name="lastname" class="form-control form-control-lg" placeholder="Sobrenome" maxlength="100" required />
                    </div>

                    <div class="form-outline form-white mb-4">
                        <label class="form-label" for="email">Insira seu melhor email</label>
                        <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Email" maxlength="100" required />
                    </div>

                    <div class="form-outline form-white mb-4">
                        <label class="form-label" for="senha">Senha</label> 
                        <input type="password" id="senha" name="senha" class="form-control form-control-lg" placeholder="Senha" maxlength="15" required />
                    </div>

                    <div class="form-outline form-white mb-4">
                        <label class="form-label" for="confSenha">Confimar senha</label>
                        <input type="password" id="confSenha" name="confSenha" class="form-control form-control-lg" placeholder="Confirmar senha" maxlength="15" required />
                    </div>

                   <input id="enviar" class="btn btn-outline-light btn-lg px-5" type="submit" value="Cadastrar">

                </form>
                
                  <div>
                    <a href="index.php" class="text-white-50 fw-bold">Retornar</a></p>
                  </div>
            </div>   
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<!--
<script src="enviar/cad.js"></script> -->