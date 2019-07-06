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

    <title>Registro</title>

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
                                                <div class="form-group">
                                                    <label for="Email">Email</label>
                                                    <input type="email" class="form-control" id="Email" name="Email" placeholder="Email">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Avatar">Avatar</label>
                                                    <input type="file" class="form-control" id="Avatar" name="Avatar" placeholder="Avatar">
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <label for="Password">Contraseña</label>
                                                        <input type="password" class="form-control" id="Password" name="Password" placeholder="Contraseña">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="RepeatPassword">Repetir Contraseña</label>
                                                        <input type="password" class="form-control" id="RepeatPassword" name="RepeatPassword" placeholder="Repetir Contraseña">
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary btn-user btn-block" id="Registrar-person" name="Registrar-person" type="submit">Registrar Cuenta</button>
                                            </form>
                                            <hr>
                                            <div class="text-center">
                                                <a class="small" href="404.php">Se te olvidó tu contraseña?</a>
                                            </div>
                                            <div class="text-center">
                                                <a class="small" href="login.php">Ya tienes una cuenta? Inicia sesión!</a>
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
    <script src="js/function.js"></script>
	<script src="js/usuario.js"></script>

</body>
</html>