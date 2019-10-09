<?php include './controller/registerValidation.php';?>

<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<a class="navbar-brand" href="./index.php">Login</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
			<ul class="navbar-nav ml-auto">
				
				<li class="nav-item">
					<a class="nav-link" href="./index.php">Ingresar</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="#">Registrarse</a>
				</li>
			</ul>
		</div>
	</nav>


	<div class="container mt-3">
		<div class="row justify-content-center">
			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8" >
				<div class="card px-3 py-3">
					<form action="./register.php" method="POST">
					
						<div class="form-group">
							<label for="name">Nombre:</label>
							<input class="form-control" type="text" name="name" id="name"
								value="<?php echo $validatior->getData()["name"];?>">
							<small class="text-danger">
								<?php echo $validatior->getErrores()["name"];?>
							</small>
						</div>

						<div class="form-group">
							<label for="lastname1">Primer Apellido:</label>
							<input class="form-control" type="text" name="lastname1" id="lastname1"
								value="<?php echo $validatior->getData()["lastname1"];?>">
							<small class="text-danger">
								<?php echo $validatior->getErrores()["lastname1"];?>
							</small>
						</div>
						
						<div class="form-group">
							<label for="lastname2">Segundo Apellido:</label>
							<input class="form-control" type="text" name="lastname2" id="lastname2"
								value="<?php echo $validatior->getData()["lastname2"];?>">
							<small class="text-danger">
								<?php echo $validatior->getErrores()["lastname2"];?>
							</small>
						</div>
						
						<div class="form-group">
							<label for="number">Telefono:</label>
							<input class="form-control" type="text" name="number" id="number"
								value="<?php echo $validatior->getData()["number"];?>">
							<small class="text-danger">
								<?php echo $validatior->getErrores()["number"];?>
							</small>
						</div>
						
						<div class="form-group">
							<label for="email">Correo:</label>
							<input class="form-control" type="text" name="email" id="email"
								value="<?php echo $validatior->getData()["email"];?>">
							<small class="text-danger">
								<?php echo $validatior->getErrores()["email"];?>
							</small>
						</div>
						
						<div class="form-group">
							<label for="username">Usuario:</label>
							<input class="form-control" type="text" name="username" id="username"
								value="<?php echo $validatior->getData()["username"];?>">
							<small class="text-danger">
								<?php echo $validatior->getErrores()["username"];?>
							</small>
						</div>
						
						<div class="form-group">
							<label for="password">Contraseña:</label>
							<input class="form-control" type="password" name="password" id="password"
								value="<?php echo $validatior->getData()["password"];?>">
							<small class="text-danger">
								<?php echo $validatior->getErrores()["password"];?>
							</small>
						</div>
						<button class="btn btn-primary btn-block" type="submit">enviar</button>
					</form>
				</div>
			</div>
			<?php
                if ($error == 1) {
                    echo '<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3" >
						<div class="alert alert-dismissible alert-danger">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>Este correo ya esta en uso.</strong>	 
						</div>
					</div>';
                } else {
                    if ($error == 2) {
                        echo '<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3" >
							<div class="alert alert-dismissible alert-danger">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>Este usuario ya esta en uso.</strong>
							</div>
						</div>';
                    } else {
                        if ($error==3) {
                            echo '<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3" >
								<div class="alert alert-dismissible alert-danger">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>Error al crear el usuario.</strong>
								</div>
							</div>';
                        }
                    }
                }
            ?>
			
		</div>
		
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
		crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		crossorigin="anonymous"></script>
</body>

</html>