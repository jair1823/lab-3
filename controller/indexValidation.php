<?php
	include './clases/validator.php';
	include './clases/database.php';
	$validatior = new Validator();
	$db = new Database();
	echo sha1('Holahola1');
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		//Hago la validacion de datos
		$validatior->validateUsername($_POST["username"]);
		$validatior->validatePassword($_POST["password"]);		

		//si pasa la validacion se manda a revisar los datos con la BD.
		if($validatior->isValid()){
			$result = $db->login($_POST["username"],sha1($_POST["password"]));
			if ($result == 1) {
				echo "<script>alert('Entra');</script>";
			}else{
				echo "<script>alert('No Entra');</script>";
			}
			
		}
	}