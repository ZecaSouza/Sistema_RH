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

                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                <p class="text-white-50 mb-5">Insira seu Email e Senha:</p>
                  <form id="index-form" action="auth_process.php" method="POST">
                    
                    <input type="hidden" name="type" value="login">
                      <div class="form-outline form-white mb-4">
                          <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Digite seu email" />
                          <label class="form-label" for="email">Email</label>
                      </div>

                      <div class="form-outline form-white mb-4">
                          <input type="password" id="senha" name="senha" class="form-control form-control-lg" placeholder="Senha" />
                          <label class="form-label" for="senha">Senha</label>
                      </div>

                      <input class="btn btn-outline-light btn-lg px-5" type="submit" value="Logar">
                </form>
              </div>

              <div>
                <p class="mb-0">Realize seu cadastro <a href="cadastro.php" class="text-white-50 fw-bold">Clicando aqui</a></p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
</body>
<!-- BOOTSTRAP js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.js" integrity="sha512-0agUJrbt+sO/RcBuV4fyg3MGYU4ajwq2UJNEx6bX8LJW6/keJfuX+LVarFKfWSMx0m77ZyA0NtDAkHfFMcnPpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- envio de forms -->

</html>

<?php
    include_once("templates/footer.php")
?>