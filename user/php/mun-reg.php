<?php
    session_start();

    require 'config.php';

    $con = new Connection();
    $cmd = $con->getConnection();

    $IdMuni = $_POST['id'];

    $result = $cmd->query("CALL set_SeguirMuni('".$_SESSION['usuario'][0]['IdUsuario']."', '".$IdMuni."')");
    $cmd->close();

    if($result) {
        echo true;
    } else {
        echo false;
    }
    