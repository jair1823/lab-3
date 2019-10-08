<?php 
	class Validator
	{
		private $data = [];
		private $errores = [];

		//valida solamente el username
		public function validateUsername($username){
			if (empty($username)) {
				$this->errores["username"] = "El nombre de usuario es requerido";
			}else{
				$this->data["username"] = $this->test_input($username);
				if(!preg_match("/^[a-zA-Z][a-zA-Z0-9]*$/", $this->data["username"])){
					$this->errores["username"] = "No es un nombre de usuario valido";
				}
			}
		}

		//valida password
		public function validatePassword($password){
			if (empty($password)) {
				$this->errores["password"] = "Falta la contraseña";
			}else{
				$this->data["password"] = $this->test_input($password);
				if(!preg_match("/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,45}$/",$this->data["password"]) || (strlen($this->data["password"]))>45 || (strlen($this->data["password"]))<8 ){
					$this->errores["password"] =  "La clave solo debe ser una combinación de letras mayúsculas, minúsculas (sin tildes) y números, de mínimo 8 caracteres y máximo 45.";
				}
			}
		}

		//valida nombre
		public function validateName($name){
			if (empty($name)) {
				$this->errores["name"] = "El nombre es requerido.";
			}else{
				$this->data["name"] = $this->test_input($name);
				
				if(!preg_match("/^[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ]*$/",$this->data["name"]) || (strlen($this->data["name"]))>45){
					$this->errores["name"] =  "El nombre no puede tener numeros.";
				}
			}
		}

		//valida apellido1
		public function validateLastname1($lastname1){
			if (empty($lastname1)) {
				$this->errores["lastname1"] = "El primer apellido es requerido.";
			}else{
				$this->data["lastname1"] = $this->test_input($lastname1);
				if(!preg_match("/^[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ]*$/",$this->data["lastname1"]) || (strlen($this->data["lastname1"]))>45 ){
					$this->errores["lastname1"] =  "El primer apellido no puede tener numeros.";
				}
			}
		}

		//valida apellido2
		public function validateLastname2($lastname2){
			if (empty($lastname2)) {
				$this->errores["lastname2"] = "El segundo apellido es requerido.";
			}else{
				$this->data["lastname2"] = $this->test_input($lastname2);
				if(!preg_match("/^[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ]*$/",$this->data["lastname2"]) || (strlen($this->data["lastname2"]))>45){
					$this->errores["lastname2"] =  "El segundo apellido no puede tener numeros.";
				}
			}
		}

		//valida correo
		public function validateEmail($email)
		{
			if (empty($email)) {
				$this->errores["email"] = "El correo es requerido.";
			}else{
                $this->data["email"] = $this->test_input($email);
                if (!preg_match("/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/", $this->data["email"]) || (strlen($this->data["email"]))>45) {
                    $this->errores["email"] =  "El correo no es valido.";
                }
            }
		}

		//valida telefono
		public function validateNumber($number)
		{
			if (empty($number)) {
				$this->errores["number"] = "El numero es requerido.";
			}else{
				$this->data["number"] = $this->test_input($number);
				
				$this->data["number"] = str_replace(' ', '', $this->data["number"]);

                if (!preg_match("/^\+[0-9]*$/", $this->data["number"]) || (strlen($this->data["number"]))>45) {
                    $this->errores["number"] =  "El número de celular solo debe contener números (a excepción del + del código de área), y debe ser de máximo 45 caracteres.";
                }
            }
		}

		//indica si es valido todo en conjunto o no.
		public function isValid(){
			return empty($this->errores);
		}

		//Ni idea, lo agarre de la presentacion de la profe
		private function test_input($d){
			$d = trim($d);
			$d = stripcslashes($d);
			$d = htmlspecialchars($d);
			return $d;
		}

		//gets & sets, pero no hay sets aun xd
		public function getData(){
			return $this->data;
		}

		public function getErrores(){
			return $this->errores;
		}

	}