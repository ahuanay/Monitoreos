<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/default.min.css"/>
</head>
<body>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../js/alertify.min.js"></script>
</body>
</html>
<?php

    require 'config.php';

    $con = new Connection();
    $cmd = $con->getConnection();

    $Nombre = $_POST['Proyecto'];
    $CodigoSNIP = $_POST['CodigoSNIP'];
    $Periodo = $_POST['Periodo'];
    $Duracion = $_POST['Duracion'];
    $FechaInicio = $_POST['FechaInicio'];
    $FechaViable = $_POST['FechaViable'];
    $Estado = $_POST['Estado'];
    $Modalidad = $_POST['Modalidad'];
    $Departamento = $_POST['Departamento'];
    $Provincia = $_POST['Provincia'];
    $Distrito = $_POST['Distrito'];
    $Ubicacion = $_POST['Ubicacion'];
    $AreaEjecutora = $_POST['AreaEjecutora'];
    $Residente = $_POST['Residente'];
    $Supervisor = $_POST['Supervisor'];
    $MontoInversion = $_POST['MontoInversion'];
    $Funcion = $_POST['Funcion'];
    $IdUsuario = $_SESSION['usuario'][0]['IdUsuario'];

    $DatosTecnicos = $_FILES['DatosTecnicos']['tmp_name'];
    $bytesDatosTecnicos = $cmd->real_escape_string(file_get_contents($DatosTecnicos));
    
    $result = $cmd->query("CALL set_Proyeto('".$CodigoSNIP."', '".$IdUsuario."', '".$Nombre."', '".$Modalidad."', '".$Periodo."', '".$Ubicacion."', '".$Departamento."', '".$Provincia."', '".$Distrito."', '".$Estado."', '".$FechaInicio."', '".$FechaViable."', '".$Duracion."', '".$AreaEjecutora."', '".$Residente."', '".$Supervisor."', '".$MontoInversion."', '".$Funcion."', '".$bytesDatosTecnicos."')");
    $cmd->close();

    if($result)
        echo "<script>alertify.alert('Se registro con exito', function(){ location.href = '../index.php'; }); </script>";
    else
        echo "<script>alertify.alert('Error al registrarse', function(){ location.href = '../register-business.php'; }); </script>";
?>
