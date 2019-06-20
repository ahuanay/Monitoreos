<?php
    session_start();

    require 'config.php';

    $con = new Connection();
    $cmd = $con->getConnection();

    $IdRespuesta = $_POST['IdRespuesta'];
    $Respuesta = $_POST['Respuesta'];

    $result = $cmd->query("CALL up_Respuesta('".$IdRespuesta."', '".$Respuesta."')");
    $cmd->close();

    if($result)
        echo true;
    else
        echo false;