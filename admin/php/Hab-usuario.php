<?php

    require 'config.php';

    $con = new Connection();
    $cmd = $con->getConnection();

    $IdUsuario = $_POST['IdUsuario'];
    $Tipo = $_POST['Tipo'];

    if($Tipo == 1) {
        $cmd->query("CALL up_usuario_valido('".$IdUsuario."', '1')");
        $cmd->close();
    }
    if($Tipo == 2) {
        $cmd->query("CALL up_usuario_valido('".$IdUsuario."', '0')");
        $cmd->close();
    }