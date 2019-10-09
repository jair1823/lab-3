<?php
    
    include './clases/database.php';
    
    if (empty($_COOKIE["username"])) {
        header("Location: ./index.php");
    }

    $username = $_COOKIE["username"];
    $db = new Database();

    $user = $db->getDatauser($username);
