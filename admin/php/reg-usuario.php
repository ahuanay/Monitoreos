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

    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $DNI = $_POST['DNI'];
    $Telefono = $_POST['Telefono'];
    $Email = $_POST['Email'];
    $Avatar = $_FILES['Avatar']['tmp_name'];
    $bytesAvatar = $cmd->real_escape_string(file_get_contents($Avatar));
    $Password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
    
    $result = $cmd->query("CALL set_Usuario_Admin('".$Email."', '".$Password."', '".$bytesAvatar."', '".$DNI."', '".$Apellido."', '".$Nombre."', '".$Telefono."')");
    $cmd->close();

    if($result)
        echo "<script>alertify.alert('Se registro con exito', function(){ location.href = '../index.php'; }); </script>";
    else
        echo "<script>alertify.alert('Error al registrarse', function(){ location.href = '../register.php'; }); </script>";
    
?>
