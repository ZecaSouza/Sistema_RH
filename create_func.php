<?php
    include_once("templates/header.php")
?>
<script>
    $(function(){
        $("#create-form").submit(function(){
            $.ajax({
                url: "create_process.php",
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
<div class="recebeform"></div>
    <div id="main-container" class="container-fluid">
        <h1 id="main-title">Adicionar funcionario</h1>
        <form id="create-form"  method="post" >
            <input type="hidden" name="type" value="create">
            <div class="form-group col-sm form-outline">
                <label for="nome_func">Nome Completo:</label>
                <input type="text" class="form-control" id="nome_func" name="nome_func" placeholder="Nome Completo" required>
            </div>
            <div class="form-group col-sm form-outline">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Insira o CPF" required >
            </div> 
            <div class="form-group col-sm form-outline">
                <label for="cargo">Selecione o cargo do Funcionario:</label>
                <select class="form-control" id="cargo" name="cargo">
                    <?php
                        $stmt = $conn->prepare("SELECT * FROM cargo ORDER BY id DESC");
                        $stmt->execute();

                        if($stmt->rowCount() > 0){
                            while($dados = $stmt->fetch(PDO::FETCH_ASSOC)){
                                echo "<option value='{$dados['title']}'>{$dados['title']}</option>";
                            }
                        }
                    ?>
                    <option selected="selected">Selecione um cargo:</option>
                </select>
            </div>
            <div class="form-group col-sm form-outline">
                <label for="dataCon">Data da Contratação:</label>
                <input type="date" name="dataCon" id="dataCon">
            </div>
            <div class="form-group col-sm form-outline">
                <label for="id_func">Escola um numero ID</label>
                <input type="number" class="form-control" id="id_func" name="id_func" placeholder="Escolha o id" required >
            </div>
            <input class="btn btn-outline-light btn-lg px-5 form-group col-sm form-outline" id="enviar" type="submit" value="Cadastrar Funcionario">
        </form>
    </div>
    
<?php
    include_once("templates/footer.php")
?>
