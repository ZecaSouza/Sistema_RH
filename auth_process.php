<?php

require_once("globals.php");
require_once("db.php");
require_once("models/User.php");
require_once("models/message.php");
require_once("dao/UserDao.php");

$message = new Message($BASE_URL);

$userDAO = new UserDao($conn, $BASE_URL);


// resgate tipo de Form
$type = filter_input(INPUT_POST, "type");

// Verificar o tipo de Form
if($type === "register"){   

    $name = filter_input(INPUT_POST, "name");
    $lastname = filter_input(INPUT_POST, "lastname");
    $email = filter_input(INPUT_POST, "email");
    $senha = filter_input(INPUT_POST, "senha");
    $confSenha = filter_input(INPUT_POST, "confSenha");
    
    // verificação de dados enviadpos
    if($name && $lastname && $email && $senha){
        //verificar senhas conferem
        if($senha === $confSenha){

            //verificar se oe email a existe
            if($userDAO->findByEmail($email) === false){
                
                $user = new User();

                // crianção de token e senha
                $userToken = $user->generateToken();
                $finalPassword = password_hash($senha, PASSWORD_DEFAULT);

                $user->name = $name;
                $user->lastname = $lastname;
                $user->email = $email;
                $user->senha = $finalPassword;
                $user->token = $userToken;

                $auth = true;

                $userDAO->create($user, $auth);

            } else {

                //o email a existe
                $message->setMessage("O email a existe no banco de dados, tente outro email." , "error", "back");
            }
        }else{
            //senhas não conferem
            $message->setMessage("Senhas não conferem." , "error", "back");
        }

    }else{
        //mensagem de erro de falta de dados
        $message->setMessage("Por favor preencha todos os campos" , "error", "back");
    }

}else if($type === "login"){
    $email = filter_input(INPUT_POST, "email");
    $senha = filter_input(INPUT_POST, "senha");

    //Autentcar usuario
    if($userDAO->authenticateUser($email, $senha)){

        $message->setMessage("Logado com sucesso" , "success", "home.php");
        // REdireciona o Usuario
    } else {
        $message->setMessage("" , "error", "home.php");
    }
} else { 

    $message->setMessage("Informações inválidas!" , "error", "back");

}
