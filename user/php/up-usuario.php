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

    if(isset($_POST['ActualizarAvatar'])) {
        $IdUsuario = $_POST['IdUsuario'];
        $Avatar = $_FILES['Avatar']['tmp_name'];
        $bytesAvatar = $cmd->real_escape_string(file_get_contents($Avatar));
        
        $result = $cmd->query("CALL up_Usuario_Avatar('".$IdUsuario."', '".$bytesAvatar."')");
        $cmd->close();

        if($result)
            echo "<script>alertify.alert('Se actualizo con exito', function(){ location.href = '../perfil.php'; }); </script>";
        else
            echo "<script>alertify.alert('Error al actualizar', function(){ location.href = '../perfil.php'; }); </script>";
    }

    if(isset($_POST['ActualizarDatos'])) {
        $IdUsuario = $_POST['IdUsuario'];
        $Nombre = $_POST['Nombre'];
        $Apellido = $_POST['Apellido'];
        $Telefono = $_POST['Telefono'];
        $Email = $_POST['Email'];
        
        $result = $cmd->query("CALL up_Usuario_Datos('".$IdUsuario."', '".$Email."', '".$Apellido."', '".$Nombre."', '".$Telefono."')");
        $cmd->close();

        if($result)
            echo "<script>alertify.alert('Se actualizo con exito', function(){ location.href = '../perfil.php'; }); </script>";
        else
            echo "<script>alertify.alert('Error al actualizar', function(){ location.href = '../perfil.php'; }); </script>";
    }
?>
