<?php
    include './clases/validator.php';
    include './clases/database.php';
    $db = new Database();
    $validatior = new Validator();
    $error = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //Hago la validacion de datos
        $validatior->validateName($_POST["name"]);

        $validatior->validateLastname1($_POST["lastname1"]);

        $validatior->validateLastname2($_POST["lastname2"]);

        $validatior->validateNumber($_POST["number"]);

        $validatior->validateEmail($_POST["email"]);

        $validatior->validateUsername($_POST["username"]);

        $validatior->validatePassword($_POST["password"]);

        //si pasa la validacion se manda a revisar los datos con la BD.
        if ($validatior->isValid()) {
            $validUsername = $db->usernameValidate($_POST["username"]);
            
            $validEmail = $db->emailValidate($_POST["email"]);
            
            if ($validEmail == 0) {
                if ($validUsername == 0) {
                    $r = $db->createUser(
                        $validatior->getData()['name'],
                        $validatior->getData()['lastname1'],
                        $validatior->getData()['lastname2'],
                        $validatior->getData()['username'],
                        sha1($validatior->getData()['password']),
                        $validatior->getData()['email'],
                        $validatior->getData()['number']
                    );
                    if ($r == 0) {
                        $error = 3;
                    } else {
                        setcookie('new_user', 1);
                        header("Location: ./index.php");
                    }
                } else {
                    $error = 2;
                }
            } else {
                $error = 1;
            }
        }
    }
