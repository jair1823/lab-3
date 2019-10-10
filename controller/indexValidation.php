<?php
    include './clases/validator.php';
    include './clases/database.php';
    $validatior = new Validator();
    $db = new Database();

    $credential = 0;
    
    setcookie("username", "");


    if ($_COOKIE["new_user"] == 1) {
        $credential = 2;
        setcookie("new_user",0);
    }

    $username = $_COOKIE["username"];
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //Hago la validacion de datos
        $validatior->validateUsername($_POST["username"]);
        $validatior->validatePassword($_POST["password"]);

        //si pasa la validacion se manda a revisar los datos con la BD.
        if ($validatior->isValid()) {
            $result = $db->login($_POST["username"], sha1($_POST["password"]));
            if ($result == 1) {
                setcookie("username", $_POST["username"]);
                header("Location: ./home.php");
            } else {
                $credential = 1;
            }
        }
    }
