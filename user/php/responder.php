<?php
    session_start();

    require 'config.php';

    $con = new Connection();
    $cmd = $con->getConnection();

    $IdComentario = $_POST['IdComentario'];
    $Respuesta = $_POST['Respuesta'];
    $IdUsuario = $_SESSION['usuario'][0]['IdUsuario'];

    $result = $cmd->query("CALL set_Respuesta('".$Respuesta."', '".$IdComentario."', '".$IdUsuario."')");
    $cmd->close();

    if($result)
        echo true;
    else
        echo false;
