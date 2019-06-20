<?php
    session_start();

    if(isset($_POST['IdProyecto'])){
        $_SESSION['IdProyecto'] = $_POST['IdProyecto'];
    } else {
        require 'php/get.php';
        $get = new get();
        $IdProyecto = $_SESSION['IdProyecto'];
        $result = $get->getSP("get_DetalleProyecto('".$IdProyecto."')");
        $resultI = $get->getSP("get_ImagenesProyectoxIdProyecto('".$IdProyecto."')");
        $resultC = $get->getSP("get_ComentariosxProyecto('".$IdProyecto."')");
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
                                <?php while ($row = $result->fetch_assoc()) { ?>
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary"><?php echo $row['NombreObra']; ?></h6>
                                        <b>SNIP <a href="http://ofi2.mef.gob.pe/bp/ConsultarPIP/frmConsultarPIP.asp?accion=consultar&txtCodigo=<?php echo $row['IdProyecto']; ?>" target="_blank"><?php echo $row['IdProyecto']; ?></a></b>
                                    </div>
                                    <div class="card-body">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#Informacion" data-toggle="tab" role="tab">Información</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#Imagenes" data-toggle="tab" role="tab">Imágenes</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#Comentarios" data-toggle="tab" role="tab">Comentarios</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="Informacion" role="tabpanel">
                                                <div class="card m-2">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group row">
                                                                    <label for="" class="col-3 col-form-label">Ubicación</label>
                                                                    <div class="col-9">
                                                                        <input type="text" class="form-control" value="<?php echo $row['Ubicacion']; ?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="" class="col-3 col-form-label">Estado</label>
                                                                    <div class="col-9">
                                                                        <input type="text" class="form-control" value="<?php echo $row['EstadoProyecto']; ?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="" class="col-3 col-form-label">Fecha Inicio</label>
                                                                    <div class="col-9">
                                                                        <input type="text" class="form-control" value="<?php echo $row['FechaInicio']; ?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="" class="col-3 col-form-label">Fecha Viable</label>
                                                                    <div class="col-9">
                                                                        <input type="text" class="form-control" value="<?php echo $row['FechaViable']; ?>" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group row">
                                                                    <label for="" class="col-3 col-form-label">Distrito</label>
                                                                    <div class="col-9">
                                                                        <input type="text" class="form-control" value="<?php echo $row['Distrito']; ?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="" class="col-3 col-form-label">Modalidad</label>
                                                                    <div class="col-9">
                                                                        <input type="text" class="form-control" value="<?php echo $row['ModalidadProyecto']; ?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="" class="col-3 col-form-label">Fecha Fin</label>
                                                                    <div class="col-9">
                                                                        <input type="text" class="form-control" value="<?php echo $row['FechaFin']; ?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="" class="col-3 col-form-label">Duración</label>
                                                                    <div class="col-9">
                                                                        <input type="text" class="form-control" value="<?php echo $row['Duracion']; ?>" readonly>
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
                                                                    <label for="" class="col-3 col-form-label">Area Ejecutora</label>
                                                                    <div class="col-9">
                                                                        <input type="text" class="form-control" value="<?php echo $row['AreaEjecutora']; ?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="" class="col-3 col-form-label">Residente</label>
                                                                    <div class="col-9">
                                                                        <input type="text" class="form-control" value="<?php echo $row['Residente']; ?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="" class="col-3 col-form-label">Supervisor</label>
                                                                    <div class="col-9">
                                                                        <input type="text" class="form-control" value="<?php echo $row['Supervisor']; ?>" readonly>
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
                                                                    <label for="" class="col-3 col-form-label">Monto de Inversión</label>
                                                                    <div class="col-9">
                                                                        <input type="text" class="form-control" value="<?php echo 'S/. '.number_format($row['MontoInversion'],2); ?>" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group row">
                                                                    <label for="" class="col-3 col-form-label">Función</label>
                                                                    <div class="col-9">
                                                                        <input type="text" class="form-control" value="<?php echo $row['Funcion']; ?>" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <?php
                                                                    $AvanceFinanciero = round($row['AvanceFinanciero'] * 100 / $row['MontoInversion'],2);
                                                                    $FechaInicio = new DateTime($row['FechaInicio']);
                                                                    $FechaViable = new DateTime($row['FechaViable']);
                                                                    $FechaActual = new DateTime(date("Y") . "-" . date("m") . "-" . date("d"));
                                                                    if(strtotime(date("Y") . "-" . date("m") . "-" . date("d")) >= strtotime($row['FechaViable']))
                                                                        $AvanceFisico = 100;
                                                                    else {
                                                                        $FechaInicioViable = $FechaInicio->diff($FechaViable);
                                                                        $FechaInicioActural = $FechaInicio->diff($FechaActual);
                                                                        $DiasTotal = $FechaInicioViable->days;
                                                                        $DiasTrans = $FechaInicioActural->days;
                                                                        $AvanceFisico = round($DiasTrans * 100 / $DiasTotal,2);
                                                                    }
                                                                ?>
                                                                <h4 class="small font-weight-bold">Avance Físico: <span class="float-right"><?php echo $AvanceFisico; ?>%</span></h4>
                                                                <div class="progress mb-4">
                                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $AvanceFisico; ?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                                <h4 class="small font-weight-bold">Avance Financiero: <?php echo 'S/. '.number_format($row['AvanceFinanciero'],2); ?><span class="float-right"><?php echo $AvanceFinanciero; ?>%</span></h4>
                                                                <div class="progress mb-4">
                                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $AvanceFinanciero; ?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card m-2">
                                                    <div class="card-body">
                                                        <a href="datos-tecnicos.php" target="_blank"><i class="fas fa-file-pdf"></i> Ver Datos Técnicos</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade show" id="Imagenes" role="tabpanel">
                                                <div class="card m-2">
                                                    <div class="card-body d-flex flex-wrap justify-content-around">
                                                        <?php while ($rowI = $resultI->fetch_assoc()) { ?>
                                                            <div class="card m-5" style="width: 12rem;">
                                                                <img class="card-img-top" src="data:image/jpeg; base64, <?php echo base64_encode($rowI['ImagenProyecto']); ?>">
                                                                <div class="card-body">
                                                                    <p class="card-text"><?php echo $rowI['Descripcion']; ?></p>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade show" id="Comentarios" role="tabpanel">
                                                <div class="card m-2">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-1">
                                                                <img class="img-profile rounded-circle" style="width: 100%" src="data:image/jpeg; base64, <?php echo base64_encode($ArrayUsuario[0]['Avatar']); ?>" <?php echo isset($_SESSION['usuario']) ? '': 'hidden'; ?>>
                                                            </div>
                                                            <div class="col-11">
                                                                <textarea class="form-control" id="CampComentario" placeholder="Comentario"></textarea>
                                                                <button class="btn btn-primary mt-2" <?php echo isset($_SESSION['usuario']) ? '': 'disabled'; ?> id="Comentar">Comentar</button>
                                                            </div>
                                                        </div>
                                                    </div>  
                                                </div>
                                                <div class="card m-2">
                                                    <?php while ($rowC = $resultC->fetch_assoc()) {
                                                        if($rowC['TipoUsuario'] == 'MUNICIPAL') {
                                                            $resultM = $get->getSP("get_MunicipalidadxIdUsuario('".$rowC['IdUsuario']."')");
                                                            while ($rowM = $resultM->fetch_assoc()){
                                                                $Nombre = $rowM['RazonSocial'];
                                                            }
                                                        } else {
                                                            $Nombre = $rowC['Nombre'];
                                                        }
                                                        ?>
                                                        <div class="card-body mt-2">
                                                            <div class="row">
                                                                <div class="col-1">
                                                                    <img class="img-profile rounded-circle" style="width: 100%" src="data:image/jpeg; base64, <?php echo base64_encode($rowC['Avatar']); ?>">
                                                                </div>
                                                                <div class="col-11 comen">
                                                                    <b><?php echo $Nombre; ?></b> <textarea class="form-control-plaintext contComen" readonly><?php echo $rowC['Comentario']; ?></textarea>
                                                                    <div class="mt-2">
                                                                        <a href="" class="habRes">Responder</a>
                                                                        <?php if(isset($_SESSION['usuario'])) {
                                                                            if($rowC['IdUsuario'] == $_SESSION['usuario'][0]['IdUsuario']) {
                                                                        ?>
                                                                            <a href="" class="EditarComen">Editar</a>
                                                                            <button class="btn btn-primary ModComen" hidden data-id="<?php echo $rowC['IdComentario']?>">Modificar Comentario</button>
                                                                            <button class="btn btn-primary CerModComen" hidden>Cerrar</button>
                                                                        <?php }} ?>
                                                                    </div>
                                                                    <div class="Respuesta" hidden>
                                                                        <textarea class="form-control CampResponder" placeholder="Responder"></textarea>
                                                                        <button class="btn btn-primary mt-2 Responder" <?php echo isset($_SESSION['usuario']) ? '': 'disabled'; ?> data-id="<?php echo $rowC['IdComentario']; ?>">Responder</button>
                                                                        <button class="btn btn-primary mt-2 Cerrar">Cerrar</button>
                                                                    </div>
                                                                    <?php
                                                                        $resultR = $get->getSP("get_RespuestaxComentario('".$rowC['IdComentario']."')");
                                                                        while ($rowR = $resultR->fetch_assoc()) {
                                                                            if($rowR['TipoUsuario'] == 'MUNICIPAL') {
                                                                                $resultMR = $get->getSP("get_MunicipalidadxIdUsuario('".$rowR['IdUsuario']."')");
                                                                                while ($rowMR = $resultMR->fetch_assoc()){
                                                                                    $NombreR = $rowMR['RazonSocial'];
                                                                                }
                                                                            } else {
                                                                                $NombreR = $rowR['Nombre'];
                                                                            }
                                                                    ?>
                                                                        <div class="row mt-2">
                                                                            <div class="col-1">
                                                                                <img class="img-profile rounded-circle" style="width: 80%" src="data:image/jpeg; base64, <?php echo base64_encode($rowR['Avatar']); ?>">
                                                                            </div>
                                                                            <div class="col-11 resp">
                                                                                <b><?php echo $NombreR; ?></b> <textarea class="form-control-plaintext contResp" readonly><?php echo $rowR['Respuesta']; ?></textarea>
                                                                                <div class="mt-2">
                                                                                    <?php if(isset($_SESSION['usuario'])) {
                                                                                        if($rowR['IdUsuario'] == $_SESSION['usuario'][0]['IdUsuario']) {
                                                                                    ?>
                                                                                        <a href="" class="EditarResp">Editar</a>
                                                                                        <button class="btn btn-primary ModResp" hidden data-id="<?php echo $rowR['IdRespuesta']?>">Modificar Respuesta</button>
                                                                                        <button class="btn btn-primary CerModResp" hidden>Cerrar</button>
                                                                                    <?php }} ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
								
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
	<script src="js/detalle-proy.js"></script>
</body>
</html>
<?php } ?>