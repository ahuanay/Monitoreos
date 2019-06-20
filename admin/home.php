<?php
	session_start();

	if(!isset($_SESSION['usuario'])) {
		header('Location: index.php');
	} else {
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

</head>

<body id="page-top">
	<div id="wrapper">
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
				<div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-layer-group"></i></div>
				<div class="sidebar-brand-text mx-3">Monitoreos</div>
			</a>
			<hr class="sidebar-divider my-0">
			<li class="nav-item active">
				<a class="nav-link" href="home.php"><i class="fas fa-home"></i><span>Inicio</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="usuarios.php"><i class="fas fa-users"></i><span>Usuarios</span></a>
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
						<?php if(isset($_SESSION['usuario'])) {
							$ArrayUsuario = $_SESSION['usuario'];
							?>
							<li class="nav-item dropdown no-arrow">
								<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $ArrayUsuario[0]['Nombre']; ?></span>
									<img class="img-profile rounded-circle" src="data:image/jpeg; base64, <?php echo base64_encode($ArrayUsuario[0]['Avatar']); ?>">
								</a>
								<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
									<a class="dropdown-item" href="404.php"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Perfil</a>
									<a class="dropdown-item" href="404.php"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>Configuración</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#" id="Cerrar"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Cerrar Sesión</a>
								</div>
							</li>
						<?php } else { ?>
							<li class="nav-item"><a class="nav-link" href="login.php">Iniciar Sesión</a></li>
						<?php } ?>
					</ul>
				</nav>
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-12">
							<div class="card shadow mb-4">
								<img src="http://www.esan.edu.pe/apuntes-empresariales/2016/10/25/proyectoempresarial_principal.jpg" alt="" width="100%">
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
	<script src="js/function.js"></script>
</body>
</html>
<?php } ?>