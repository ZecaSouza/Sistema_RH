<?php
    include_once("templates/header.php");
    include_once("cargo_process.php");
?>
    <div id="main-container" class="container-fluid">
        <div class="container" id="viewr-container">
            <div id="back-link-container">
                <a href="<?= $BASE_URL ?>cargoshow.php" id="back-link">Voltar</a>
            </div>
            <h1 id="main-title"><?= $cargs["title"] ?></h1>
            <p class="bold">descição</p>
            <p><?= $cargs["bio"] ?></p>
            <p class="bold">Identificação</p>
            <p><?= $cargs["id_cargo"] ?></p>
        </div>
    </div>

<?php
    include_once("templates/footer.php")
?>