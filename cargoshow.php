<?php
    include_once("templates/header.php");
    include_once("cargo_process.php");


    $message = new Message($BASE_URL);

    $flassMenssage = $message->getMessage();

    if(!empty($flassMenssage["msg"])) {
  // Limpar mensagem
        $message->clearMessage();
    }

?>

    <div id="main-container" class="container-fluid">
         <div id="back-link-container">
             <a href="<?= $BASE_URL ?>create_cargo.php" id="back-link">Cadastrar novo</a>
        </div>
        <h1 id="main-title">Cargos</h1>
        <?php if(count($cargs) > 0): ?>
            <table class="table" id="funcs-table">
            <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Descrição</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($cargs as $carg): ?>
                        <tr>
                            <td scope="row" class="col-id"><?= $carg["id"] ?></td>
                            <td scope="row" class="col-item"><?= $carg["title"] ?></td>
                            <td scope="row" class="col-item"><?= $carg["bio"] ?></td>
                            <td class="actions">
                                <a href="<?= $BASE_URL ?>showcase.php?id=<?= $carg["id"] ?>"><i class="fas fa-eye check-icon"></i></a>
                                <a href="#"><i class="far fa-edit edit-icon"></i></a>
                                <form class="delete-form" action="<?= $BASE_URL ?>cargo_process.php" method="post">
                                
                                    <input type="hidden" name="type" value="delete">
                                    <input type="hidden" name="id" value="<?= $carg["id"] ?>">
                                    <button type="submit" class="delete-btn"><i class="fas fa-times delete-icon"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php else: ?>
        <p id="empyt-list-text">Ainda não exitem cadastros <a href="create_cargo.php">click aqui para adicionar</a></p>
        <?php endif; ?>
        
<?php
    include_once("templates/footer.php")
?>