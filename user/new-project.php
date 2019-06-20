<?php
	session_start();

	require 'php/get.php';
	$get = new get();
	
	$resultProy = $get->getSP("get_Proyectos()");
	$resultD = $get->getSP("get_Departamentos()");
	$resultEP = $get->getSP("get_EstadosProyecto()");
	$resultM = $get->getSP("get_ModalidadProyecto()");
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
				<li class="nav-item active">
					<a class="nav-link" href="new-project.php"><i class="fas fa-tag"></i><span>Nuevo Proyecto</span></a>
                </li>
                <li class="nav-item">
					<a class="nav-link" href="mis-proyectos.php"><i class="fas fa-tags"></i><span>Mis Proyecto</span></a>
				</li>
			<?php } ?>
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
									<h6 class="m-0 font-weight-bold text-primary">Nuevo Proyecto de Inversión Pública</h6>
								</div>
								<form class="card-body" action="php/reg-proyecto.php" method="post" enctype="multipart/form-data">
                                    <div class="card m-2">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <label for="Proyecto" class="col-2 col-form-label">Proyecto</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" id="Proyecto" name="Proyecto" placeholder="Nombre del Proyecto">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="CodigoSNIP" class="col-4 col-form-label">Código SNIP</label>
                                                        <div class="col-8">
                                                            <input type="text" class="form-control" id="CodigoSNIP" name="CodigoSNIP" placeholder="Código SNIP">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Periodo" class="col-4 col-form-label">Periodo</label>
                                                        <div class="col-8">
                                                            <input type="text" class="form-control" id="Periodo" name="Periodo" placeholder="Periodo">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="FechaInicio" class="col-4 col-form-label">Fecha Inicio</label>
                                                        <div class="col-8">
                                                            <input type="date" class="form-control" id="FechaInicio" name="FechaInicio" placeholder="Fecha Inicio">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="FechaViable" class="col-4 col-form-label">Fecha Viable</label>
                                                        <div class="col-8">
                                                            <input type="date" class="form-control" id="FechaViable" name="FechaViable" placeholder="Fecha Viable">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="FechaFin" class="col-4 col-form-label">Fecha Fin</label>
                                                        <div class="col-8">
                                                            <input type="date" class="form-control" id="FechaFin" name="FechaFin" placeholder="Fecha Fin" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Duracion" class="col-4 col-form-label">Duración (Dias)</label>
                                                        <div class="col-8">
                                                            <input type="text" class="form-control" id="Duracion" name="Duracion" placeholder="Duración" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="Estado" class="col-4 col-form-label">Estado</label>
                                                        <div class="col-8">
                                                        <select class="form-control" id="Estado" name="Estado">
                                                            <option value="" selected>Seleccione</option>
                                                            <?php while ($rowEP = $resultEP->fetch_assoc()) { ?>
                                                                <option value="<?php echo $rowEP['IdEstadoProyecto']; ?>">
                                                                    <?php echo $rowEP['EstadoProyecto']; ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Modalidad" class="col-4 col-form-label">Modalidad</label>
                                                        <div class="col-8">
                                                        <select class="form-control" id="Modalidad" name="Modalidad">
                                                            <option value="" selected>Seleccione</option>
                                                            <?php while ($rowM = $resultM->fetch_assoc()) { ?>
                                                                <option value="<?php echo $rowM['IdModalidadProyecto']; ?>">
                                                                    <?php echo $rowM['ModalidadProyecto']; ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Departamento" class="col-4 col-form-label">Departamento</label>
                                                        <div class="col-8">
                                                            <select class="form-control" id="Departamento" name="Departamento">
                                                                <option value="" selected>Seleccione</option>
                                                                <?php while ($rowD = $resultD->fetch_assoc()) { ?>
                                                                    <option value="<?php echo $rowD['IdDepartamento']; ?>">
                                                                        <?php echo $rowD['Departamento']; ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Provincia" class="col-4 col-form-label">Provincia</label>
                                                        <div class="col-8">
                                                            <select class="form-control" id="Provincia" name="Provincia">
                                                                <option value="" selected>Seleccione</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Distrito" class="col-4 col-form-label">Distrito</label>
                                                        <div class="col-8">
                                                            <select class="form-control" id="Distrito" name="Distrito">
                                                                <option value="" selected>Seleccione</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Ubicacion" class="col-4 col-form-label">Ubicación</label>
                                                        <div class="col-8">
                                                            <input type="text" class="form-control" id="Ubicacion" name="Ubicacion" placeholder="Ubicación">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card m-2">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <label for="AreaEjecutora" class="col-2 col-form-label">Area Ejecutora</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" id="AreaEjecutora" name="AreaEjecutora" placeholder="Area Ejecutora">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Residente" class="col-2 col-form-label">Residente</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" id="Residente" name="Residente" placeholder="Residente">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Supervisor" class="col-2 col-form-label">Supervisor</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" id="Supervisor" name="Supervisor" placeholder="Supervisor">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card m-2">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="MontoInversion" class="col-4 col-form-label">Monto de Inversión</label>
                                                        <div class="col-8">
                                                            <input type="text" class="form-control" id="MontoInversion" name="MontoInversion" placeholder="Monto de Inversión">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="Funcion" class="col-4 col-form-label">Función</label>
                                                        <div class="col-8">
                                                            <input type="text" class="form-control" id="Funcion" name="Funcion" placeholder="Función">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card m-2">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <label for="DatosTecnicos" class="col-2 col-form-label">Datos Técnicos</label>
                                                        <div class="col-10">
                                                            <input type="file" class="form-control" id="DatosTecnicos" name="DatosTecnicos">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Registrar Proyecto</button>
                                    </div>
                                </form>
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
    <script src="http://momentjs.com/downloads/moment.min.js"></script>
	<script src="js/new-project.js"></script>
</body>
</html>
