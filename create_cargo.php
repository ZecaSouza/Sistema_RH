<?php
    include_once("templates/header.php")
?>
<script>
    $(function(){
        $("#create-form").submit(function(){
            $.ajax({
                url: "cargo_process.php",
                type: "POST",
                data: $("#create-form").serialize(),
                success :function(data){
                    $(".recebeform").html(data);
                }
            });
            return false;
        });
    });
</script>
    <div id="main-container" class="container-fluid">
        <h1 id="main-title">Cadastrar Cargo</h1>
        <form id="create-form" action="<?= $BASE_URL ?>cargo_process.php" method="post">
            <input type="hidden" name="type" value="create">
            <div class="form-group col-sm form-outline">
                <label for="title">Nome da Função:</label>   
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome da função" required>
            </div>
            <div class="form-group col-sm form-outline">
                <label for="id_cargo">Escola um numero ID</label>
                <input type="number" class="form-control" id="id_cargo" name="id_cargo" placeholder="Escolha o id" required >
            </div>
            <div class="form-group col-sm form-outline">
                <label for="bio">Sobre a função:</label>
                <textarea type="number" class="form-control" id="bio" name="bio" placeholder="Escreva aqui detalhes da função" rows="4"></textarea>
            </div>
            <input class="btn btn-outline-light btn-lg px-5 form-group col-sm form-outline" type="submit" value="Cadastrar Cargo">
        </form>
    </div>

<?php
    include_once("templates/footer.php")
?>