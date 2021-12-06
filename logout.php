<?php

    require_once("globals.php");
    require_once("db.php");
    require_once("models/message.php");
    require_once("dao/UserDao.php");

    $message = new Message($BASE_URL);

    $flassMenssage = $message->getMessage();

    $userDao = new UserDao($conn, $BASE_URL);

    if($userDao){
        $userDao->destroyToken ();
    }