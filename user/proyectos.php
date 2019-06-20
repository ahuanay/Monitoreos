<?php
	session_start();

	require 'php/get.php';
	$get = new get();
	
	$resultProy = $get->getSP("get_Proyectos()");
	$resultD = $get->getSP("get_Departamentos()");
	$resultEP = $get->getSP("get_EstadosProyecto()");
	$resultM = $get->getSP("get_ModalidadProyecto()");
	$resultP = $get->getSP("get_Periodos()");
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Proyectos</title>

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
			<?php if(isset($_SESSION['usuario']) &&  $_SESSION['usuario'][0]['TipoUsuario'] == 'MUNICIPAL') { ?>
				<li class="nav-item">
					<a class="nav-link" href="new-project.php"><i class="fas fa-tag"></i><span>Nuevo Proyecto</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="mis-proyectos.php"><i class="fas fa-tags"></i><span>Mis Proyecto</span></a>
				</li>
			<?php } ?>
			<li class="nav-item active">
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
						<?php if(isset($_SESSION['usuario'])) {
							$ArrayUsuario = $_SESSION['usuario'];
							?>
							<li class="nav-item dropdown no-arrow">
								<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="mr-2 d-none d-lg-inline text-gray-600 small"><b><?php echo $ArrayUsuario[0]['Nombre']; ?></b></span>
									<img class="img-profile rounded-circle" src="data:image/jpeg; base64, <?php echo base64_encode($ArrayUsuario[0]['Avatar']); ?>">
								</a>
								<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
									<a class="dropdown-item" href="perfil.php"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Perfil</a>
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
								<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
									<h6 class="m-0 font-weight-bold text-primary">Proyectos de Inversión Pública</h6>
								</div>
								<div class="card-body">
									<div class="mt-2 mb-2">
										<div class="form-row mt-2 mb-2">
											<div class="col form-group">
												<label for="Proyecto">Nombre del Proyecto</label>
												<input type="text" class="form-control" id="Proyecto" name="Proyecto" placeholder="Nombre del Proyecto">
											</div>
											<div class="col form-group">
												<label for="Estado">Estado</label>
												<select class="form-control" id="Estado" name="Estado">
													<option value="" selected>Seleccione</option>
													<?php while ($rowEP = $resultEP->fetch_assoc()) { ?>
														<option value="<?php echo $rowEP['IdEstadoProyecto']; ?>">
															<?php echo $rowEP['EstadoProyecto']; ?>
														</option>
													<?php } ?>
												</select>
											</div>
											<div class="col form-group">
												<label for="Modalidad">Modalidad</label>
												<select class="form-control" id="Modalidad" name="Modalidad">
													<option value="" selected>Seleccione</option>
													<?php while ($rowM = $resultM->fetch_assoc()) { ?>
														<option value="<?php echo $rowM['IdModalidadProyecto']; ?>">
															<?php echo $rowM['ModalidadProyecto']; ?>
														</option>
													<?php } ?>
												</select>
											</div>
											<div class="col form-group">
												<label for="Periodo">Periodo</label>
												<select class="form-control" id="Periodo" name="Periodo">
													<option value="" selected>Seleccione</option>
													<?php while ($rowP = $resultP->fetch_assoc()) { ?>
														<option value="<?php echo $rowP['Periodo']; ?>">
															<?php echo $rowP['Periodo']; ?>
														</option>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="form-row mt-2 mb-2">
											<div class="col form-group">
												<label for="Departamento">Departamento</label>
												<select class="form-control" id="Departamento" name="Departamento">
													<option value="" selected>Seleccione</option>
													<?php while ($rowD = $resultD->fetch_assoc()) { ?>
														<option value="<?php echo $rowD['IdDepartamento']; ?>">
															<?php echo $rowD['Departamento']; ?>
														</option>
													<?php } ?>
												</select>
											</div>
											<div class="col form-group">
												<label for="Provincia">Provincia</label>
												<select class="form-control" id="Provincia" name="Provincia">
													<option value="" selected>Seleccione</option>
												</select>
											</div>
											<div class="col form-group">
												<label for="Distrito">Distrito</label>
												<select class="form-control" id="Distrito" name="Distrito">
													<option value="" selected>Seleccione</option>
												</select>
											</div>
										</div>
										<div class="mt-2 mb-2">
											<button class="btn btn-primary" id="Buscar" name="Buscar" type="submit">Buscar</button>
											<button class="btn btn-primary" id="Todo" name="Todo" type="submit">Todo</button>
										</div>
									</div>
									<div class="table-responsive">
										<table class="table" id="Contenido">
											<thead>
												<tr>
													<th scope="col">Nro</th>
													<th scope="col">Código SNIP</th>
													<th scope="col">Nombre del Proyecto de Inversión Pública</th>
													<th scope="col">Monto de Inversión (S/.)</th>
													<th scope="col">Estado de Proyectos</th>
													<th scope="col">Modalidad</th>
													<th scope="col">Periodo</th>
													<th scope="col"></th>
												</tr>
											</thead>
											<tbody>
												<?php
													$i = 1;
													while ($row = $resultProy->fetch_assoc()) {
												?>
													<tr>
														<th scope="row"><?php echo $i; ?></th>
														<td><a href="http://ofi2.mef.gob.pe/bp/ConsultarPIP/frmConsultarPIP.asp?accion=consultar&txtCodigo=<?php echo $row['IdProyecto']; ?>" target="_blank"><?php echo $row['IdProyecto']; ?></a></td>
														<td><?php echo $row['NombreObra']; ?></td>
														<td><?php echo number_format($row['MontoInversion'],2); ?></td>
														<td><?php echo $row['EstadoProyecto']; ?></td>
														<td><?php echo $row['ModalidadProyecto']; ?></td>
														<td><?php echo $row['Periodo']; ?></td>
														<td><button class="btn btn-info ver" data-id="<?php echo $row['IdProyecto']; ?>">Ver</button></td>
													</tr>
													
												<?php $i++; } ?>
											</tbody>
										</table>
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
	<script src="js/proyecto.js"></script>
</body>
</html>
