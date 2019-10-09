<?php include './controller/homeLoading.php';?>
<?php include './controller/homeValidation.php';?>
<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="./index.php">
        
            <img src="https://icon-library.net/images/avatar-icon/avatar-icon-4.jpg" class="profile-image img-circle" style="max-height: 50px;">
             <?php echo $user["nickname"]; ?>
        
        </a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
			<ul class="navbar-nav ml-auto">

				<li class="nav-item">
					<a class="nav-link" href="./index.php">Salir</a>
                </li>
                
			</ul>
		</div>
	</nav>


	<div class="container mt-5">
        <div class="row justify-content-center">
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" >
				<div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Cambiar contraseña.
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="./home.php" method="POST">
                            <div class="form-group">
                                <label for="password1">Contraseña anterior:</label>
                                <input class="form-control" type="password" name="password1" id="password1"
                                    value="<?php echo $validatior->getData()["password"];?>">
                                <small class="text-danger">
                                    <?php echo $validatior->getErrores()["password"];?>
                                </small>
                            </div>

                            <div class="form-group">
                                <label for="password2">Contraseña nueva:</label>
                                <input class="form-control" type="password" name="password2" id="password2"
                                    value="<?php echo $validatior2->getData()["password"];?>">
                                <small class="text-danger">
                                    <?php echo $validatior2->getErrores()["password"];?>
                                </small>
                            </div>

                            <button class="btn btn-primary btn-block" type="submit">Actualizar</button>
                        </form>    
                    </div>
				</div>
			</div>
		</div>
		<div class="row justify-content-center mt-2">
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" >
				<?php
                    if ($credential == 1) {
                        echo '<div class="alert alert-dismissible alert-success">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>Contraseña actualizada.</strong>														
							</div>';
                    } else {
                        if ($credential == 2) {
                            echo '<div class="alert alert-dismissible alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>La contraseña actual no es correcta.</strong>
                                </div>';
                        }
                    }
                ?>
			</div>		
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