<?php
    require_once("templates/header.php");
    require_once("dao/UserDao.php");

    $UserDao = new UserDao($conn, $BASE_URL);
    $userData = $UserDao->verifyToken();
?>
    <div id="main-container" class="container-fluid">
        <h1>Edição de perfil</h1>
    </div>

<?php
    include_once("templates/footer.php");
?>