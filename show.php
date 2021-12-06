<?php
    include_once("templates/header.php");
    include_once("func_process.php");
?>
    <div id="main-container" class="container-fluid">
        <div class="container" id="viewr-container">
            <?php include_once("templates/backbtn.html"); ?>
            <h1 id="main-title"><?= $funcs["nome_func"] ?></h1>
            <p class="bold">Cpf</p>
            <p><?= $funcs["cpf"] ?></p>
            <p class="bold">Cargo</p>
            <p><?= $funcs["cargo"] ?></p>
            <p class="bold">Data do Contrato</p>
            <p><?= $funcs["dataCon"] ?></p>
        </div>
    </div>

<?php
    include_once("templates/footer.php")
?>