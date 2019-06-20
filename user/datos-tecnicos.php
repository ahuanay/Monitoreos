<?php
session_start();
    require 'php/get.php';
    $get = new get();
    $IdProyecto = $_SESSION['IdProyecto'];
    $result = $get->getSP("get_DetalleProyecto('".$IdProyecto."')");
    while ($row = $result->fetch_assoc()) {
        $DatosTecnicos = $row['DatosTecnicos'];
    }

    header('Content-type: application/pdf');

 	echo $DatosTecnicos;

?>