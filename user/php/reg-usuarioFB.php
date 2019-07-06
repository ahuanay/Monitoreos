<?php
    require 'config.php';
    $con = new Connection();
    $cmd = $con->getConnection();

    $Email = $_POST['Email'];
    $Apellido = $_POST['Apellido'];
    $Nombre = $_POST['Nombre'];
    $Avatar = $_POST['Avatar'];

    $result = $cmd->query("CALL get_UsuarioExisteFB('".$Email."')");

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {
            $arreglo[] = array(
                'IdUsuario' => $row['IdUsuario'],
                'UrlAvatar' => $Avatar,
                'TipoUsuario' => $row['TipoUsuario'],
                'Nombre' => $row['Nombre']
            );
        }
    } else {
        $resultFB = $cmd->query("CALL set_Usuario_FB('".$Email."', '".$Apellido."', '".$Nombre."')");
        while($rowFB = $resultFB->fetch_assoc())
        {
            $arreglo[] = array(
                'IdUsuario' => $rowFB['IdUsuario'],
                'UrlAvatar' => $Avatar,
                'TipoUsuario' => $rowFB['TipoUsuario'],
                'Nombre' => $rowFB['Nombre']
            );
        }
    }
    
    $_SESSION['usuario'] = $arreglo;

?>