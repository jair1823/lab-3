<?php
	include './clases/validator.php';
	$validatior = new Validator();
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //Hago la validacion de datos
        $validatior->validateName($_POST["name"]);

        $validatior->validateLastname1($_POST["lastname1"]);

        $validatior->validateLastname2($_POST["lastname2"]);

        $validatior->validateUsername($_POST["username"]);

        $validatior->validatePassword($_POST["password"]);

        $validatior->validateEmail($_POST["email"]);
        
        $validatior->validateNumber($_POST["number"]);

		//si pasa la validacion se manda a revisar los datos con la BD.
		if($validatior->isValid()){
			echo "<script>alert('Revisar con la base de datos');</script>";
		}
	}