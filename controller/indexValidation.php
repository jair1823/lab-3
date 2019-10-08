<?php
	include './clases/validator.php';
	$validatior = new Validator();
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		//Hago la validacion de datos
		$validatior->validateUsername($_POST["username"]);
		$validatior->validatePassword($_POST["password"]);		

		//si pasa la validacion se manda a revisar los datos con la BD.
		if($validatior->isValid()){
			echo "<script>alert('Revisar con la base de datos');</script>";
		}
	}