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

    $IdProyecto = $_SESSION['IdProyecto'];

    if(isset($_POST['Actualizar'])) {
        $NombreObra = $_POST['NombreObra'];
        $CodigoSNIP = $_POST['CodigoSNIP'];
        $Periodo = $_POST['Periodo'];
        $FechaInicio = $_POST['FechaInicio'];
        $FechaViable = $_POST['FechaViable'];
        $Duracion = $_POST['Duracion'];
        $Ubicacion = $_POST['Ubicacion'];
        $AreaEjecutora = $_POST['AreaEjecutora'];
        $Residente = $_POST['Residente'];
        $Supervisor = $_POST['Supervisor'];
        $MontoInversion = $_POST['MontoInversion'];
        $Funcion = $_POST['Funcion'];
        $FechaFin = $_POST['FechaFin'];
        $Estado = $_POST['Estado'];
        $Modalidad = $_POST['Modalidad'];
        $AvanceFinanciero = $_POST['AvanceFinanciero'];

        if($FechaFin == '') {
            $FechaFin = 'null';
        }
        if($AvanceFinanciero == '') {
            $AvanceFinanciero = 0;
        }


        $result = $cmd->query("CALL up_Proyecto('".$CodigoSNIP."','".$IdProyecto."', '".$NombreObra."', '".$Modalidad."', '".$Periodo."', '".$Ubicacion."', '".$Estado."', '".$FechaInicio."', '".$FechaFin."', '".$FechaViable."', '".$Duracion."', '".$AreaEjecutora."', '".$Residente."', '".$Supervisor."', '".$MontoInversion."', '".$Funcion."', '".$AvanceFinanciero."')");
        $cmd->close();
    
        if($result)
            echo "<script>alertify.alert('Se actualizo con exito', function(){ location.href = '../mis-proyectos.php'; }); </script>";
        else
            echo "<script>alertify.alert('Error al actualizar', function(){ location.href = '../detalle-proyecto.php'; }); </script>";
    }

    if(isset($_POST['AgregarImagen'])) {
        $Descripcion = $_POST['Descripcion'];
        $Imagen = $_FILES['Imagen']['tmp_name'];
        $bytesImagen = $cmd->real_escape_string(file_get_contents($Imagen));
        
        $result = $cmd->query("CALL set_Imagen('".$bytesImagen."', '".$Descripcion."', '".$IdProyecto."')");
        $cmd->close();
    
        if($result)
            echo "<script>alertify.alert('Se registro con exito', function(){ location.href = '../detalle-proyecto.php'; }); </script>";
        else
            echo "<script>alertify.alert('Error al registrar', function(){ location.href = '../detalle-proyecto.php'; }); </script>";
    }
?>