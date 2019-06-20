<?php
    session_start();

    require 'config.php';

    $con = new Connection();
    $cmd = $con->getConnection();

    $IdComentario = $_POST['IdComentario'];
    $Comentario = $_POST['Comentario'];

    $result = $cmd->query("CALL up_Comentario('".$IdComentario."', '".$Comentario."')");
    $cmd->close();

    if($result)
        echo true;
    else
        echo false;