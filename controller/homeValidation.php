<?php
	include './clases/validator.php';
    $validatior = new Validator();
    $validatior2 = new Validator();
    
    $credential = 0;
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		//Hago la validacion de datos
        $validatior->validatePassword($_POST["password1"]);
		$validatior2->validatePassword($_POST["password2"]);		

		//si pasa la validacion se manda a revisar los datos con la BD.
		if($validatior->isValid() && $validatior2->isValid()){
            $result = $db->updatePassword($user["nickname"],sha1($_POST["password1"]),sha1($_POST["password2"]));
            if ($result == 1) {
                $validatior = new Validator();
                $validatior2 = new Validator();
                $credential = 1;
			}else{
				$credential = 2;
			}        
		}
	}