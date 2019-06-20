<?php

    session_start();
    require 'get.php';

    $get = new get();

    $Email = strtolower($_POST['Email']);
    $Password = $_POST['Password'];

    $result = $get->getSP("get_Login('$Email')");
    if(mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_assoc()){
            if(password_verify($Password, $row['Password'])) {
                if($row['TipoUsuario'] == 'ADMINISTRADOR') {
                    $arreglo[] = array(
                        'IdUsuario' => $row['IdUsuario'],
                        'Avatar' => $row['Avatar'],
                        'Nombre' => $row['Nombre']
                    );
                }
            }
        }
        $_SESSION['usuario'] = $arreglo;
        echo true;
    } else {
        echo false;
    }