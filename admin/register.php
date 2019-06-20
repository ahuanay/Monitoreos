<?php
	require 'php/get.php';
	$get = new get();
	
    $result = $get->getSP("get_Departamentos()");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>SB Admin 2 - Register</title>

	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="css/sb-admin-2.min.css" rel="stylesheet">

	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/default.min.css"/>
</head>

<body class="bg-gradient-primary">
	<div class="container">
		<div class="card o-hidden border-0 shadow-lg my-5">
			<div class="card-body p-0">
				<div class="row">
					<div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
					<div class="col-lg-7">
						<div class="p-5">
							<div class="text-center">
								<h1 class="h4 text-gray-900 mb-4">Crea una cuenta</h1>
							</div>
							<form class="user" action="php/reg-usuario.php" method="post" enctype="multipart/form-data">
								<div class="form-group row">
									<div class="col-sm-6 mb-3 mb-sm-0">
										<label for="Nombre">Nombre</label>
										<input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Nombre">
									</div>
									<div class="col-sm-6">
										<label for="Apellido">Apellido</label>
										<input type="text" class="form-control" id="Apellido" name="Apellido" placeholder="Apellido">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-6 mb-3 mb-sm-0">
										<label for="Telefono">Teléfono</label>
										<input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="Teléfono">
									</div>
									<div class="col-sm-6">
										<label for="DNI">DNI</label>
										<input type="text" class="form-control" id="DNI" name="DNI" placeholder="DNI">
									</div>
								</div>
								<div class="form-group">
									<label for="Email">Email</label>
									<input type="email" class="form-control" id="Email" name="Email" placeholder="Email">
								</div>
								<div class="form-group row">
									<div class="col-sm-6 mb-3 mb-sm-0">
										<label for="Password">Contraseña</label>
										<input type="password" class="form-control" id="Password" name="Password" placeholder="Contraseña">
									</div>
									<div class="col-sm-6">
										<label for="Avatar">Repetir Contraseña</label>
										<input type="password" class="form-control" id="RepeatPassword" placeholder="Repetir Contraseña">
									</div>
								</div>
								<div class="form-group">
									<label for="Avatar">Avatar</label>
									<input type="file" class="form-control" id="Avatar" name="Avatar" placeholder="Avatar">
								</div>
								<button class="btn btn-primary btn-user btn-block" type="submit">Registrar Cuenta</button>
							</form>
							<hr>
							<div class="text-center">
								<a class="small" href="forgot-password.php">Se te olvidó tu contraseña?</a>
							</div>
							<div class="text-center">
								<a class="small" href="index.php">Ya tienes una cuenta? Inicia sesión!</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="js/sb-admin-2.min.js"></script>

	<script src="js/alertify.min.js"></script>

	<script src="js/usuario.js"></script>

</body>

</html>
