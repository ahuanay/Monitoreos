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
    $RUC = $_POST['RUC'];
    $RazonSocial = $_POST['RazonSocial'];
    $Direccion = $_POST['Direccion'];
    $Departamento = $_POST['Departamento'];
    $Provincia = $_POST['Provincia'];
    $Distrito = $_POST['Distrito'];
    
    $result = $cmd->query("CALL set_Usuario_Alcalde('".$RUC."', '".$RazonSocial."', '".$Direccion."', '".$Email."', '".$Password."', '".$bytesAvatar."', '".$DNI."', '".$Apellido."', '".$Nombre."', '".$Telefono."', '".$Departamento."', '".$Provincia."', '".$Distrito."')");
    $cmd->close();

    if($result)
        echo "<script> alert('Se registro con exito');   window.location.href='../index.php';   </script>";
    else
        echo "<script> alert('Error al registrarse');   window.location.href='../register-business.php';   </script>";