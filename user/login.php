<?php
	session_start();
		
	if(isset($_SESSION['usuario'])) {
		header('Location: index.php');
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Inicio</title>

	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="css/sb-admin-2.min.css" rel="stylesheet">
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/default.min.css"/>

</head>

<body id="page-top">
	<div id="wrapper">
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
				<div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-layer-group"></i></div>
				<div class="sidebar-brand-text mx-3">Monitoreos</div>
			</a>
			<hr class="sidebar-divider my-0">
			<li class="nav-item">
				<a class="nav-link" href="index.php"><i class="fas fa-home"></i><span>Inicio</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="proyectos.php"><i class="fas fa-tags"></i><span>Proyectos</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="404.php"><i class="fas fa-user-alt"></i><span>Contacto</span></a>
			</li>
			<hr class="sidebar-divider d-none d-md-block">
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>
		</ul>
		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content">
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>
					<ul class="navbar-nav ml-auto">
						<div class="topbar-divider d-none d-sm-block"></div>
						<li class="nav-item"><a class="nav-link" href="login.php">Iniciar Sesión</a></li>
					</ul>
				</nav>
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-12">
							<div class="card shadow mb-4">
								<div class="row">
									<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
									<div class="col-lg-6">
										<div class="p-5">
										<div class="text-center">
											<h1 class="h4 text-gray-900 mb-4">Iniciar Sesión</h1>
										</div>
										<div class="user">
											<div class="form-group">
												<input type="email" class="form-control form-control-user" id="Email" placeholder="Email">
											</div>
											<div class="form-group">
												<input type="password" class="form-control form-control-user" id="Password" placeholder="Contraseña">
											</div>
											<div class="form-group">
												<div class="custom-control custom-checkbox small">
													<input type="checkbox" class="custom-control-input" id="customCheck">
													<label class="custom-control-label" for="customCheck">Recordarme</label>
												</div>
											</div>
											<button class="btn btn-primary btn-user btn-block" id="login">Iniciar Sesión</button>
										</div>
										<hr>
										<div class="text-center">
											<a class="small" href="404.php">Se te olvidó tu contraseña?</a>
										</div>
										<div class="text-center">
											<a class="small" href="register-person.php">Crear una personal!</a>
											<a class="small" href="register-business.php">Crear una municipal!</a>
										</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div>
				<footer class="sticky-footer bg-white">
					<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Copyright &copy; 2019</span>
					</div>
					</div>
				</footer>
			</div>
		</div>
  	</div>

	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
	<script src="js/sb-admin-2.min.js"></script>
	<script src="vendor/chart.js/Chart.min.js"></script>
	<script src="js/demo/chart-area-demo.js"></script>
	<script src="js/demo/chart-pie-demo.js"></script>
	<script src="js/alertify.min.js"></script>
	<script src="js/login.js"></script>
	<script src="js/function.js"></script>
</body>
</html>