<?php
    session_start();

    require 'config.php';

    $con = new Connection();
    $cmd = $con->getConnection();

    $Comentario = $_POST['Comentario'];
    $IdProyecto = $_SESSION['IdProyecto'];
    $IdUsuario = $_SESSION['usuario'][0]['IdUsuario'];

    $result = $cmd->query("CALL set_Comentario('".$Comentario."', '".$IdProyecto."', '".$IdUsuario."')");
    $cmd->close();

    if($result)
        echo true;
    else
        echo false;