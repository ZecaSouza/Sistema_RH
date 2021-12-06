<?php
    include_once("templates/header.php");
    include_once("func_process.php");


    $message = new Message($BASE_URL);

    $flassMenssage = $message->getMessage();

    if(!empty($flassMenssage["msg"])) {
  // Limpar mensagem
        $message->clearMessage();
    }

?>
    <div id="main-container" class="container-fluid">
        <h1 id="main-title">Lista de funcionarios</h1>
        <?php if(count($funcs) > 0): ?>
            <table class="table" id="funcs-table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">nome</th>
                        <th scope="col">cpf</th>
                        <th scope="col">cargo</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($funcs as $func): ?>
                        <tr>
                            <td scope="row" class="col-id"><?= $func["id"] ?></td>
                            <td scope="row" class="col-item"><?= $func["nome_func"] ?></td>
                            <td scope="row" class="col-item"><?= $func["cpf"] ?></td>
                            <td scope="row" class="col-item"><?= $func["cargo"] ?></td>
                            <td class="actions">
                                <a href="<?= $BASE_URL ?>show.php?id=<?= $func["id"] ?>"><i class="fas fa-eye check-icon"></i></a>
                                <a href="#"><i class="far fa-edit edit-icon"></i></a>
                                <form class="delete-form" action="<?= $BASE_URL ?>create_process.php" method="post">

                                    <input type="hidden" name="type" value="delete">
                                    <input type="hidden" name="id" value="<?= $func["id"] ?>">
                                    <button type="submit" class="delete-btn"><i class="fas fa-times delete-icon"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php else: ?>
            <p id="empyt-list-text">Ainda não exitem cadastros <a href="create_func.php">click aqui para adicionar</a></p>
        <?php endif; ?>
    </div>

<?php
    include_once("templates/footer.php")
?>