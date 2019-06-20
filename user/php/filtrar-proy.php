<?php

    require 'get.php';
	$get = new get();

    $Proyecto = $_POST['Proyecto'];
    $Estado = $_POST['Estado'];
    $Modalidad = $_POST['Modalidad'];
    $Periodo = $_POST['Periodo'];
    $Departamento = $_POST['Departamento'];
    $Provincia = $_POST['Provincia'];
    $Distrito = $_POST['Distrito'];

    $resultProy = $get->getSP("get_FiltroProyectos('".$Proyecto."', '".$Estado."', '".$Modalidad."', '".$Periodo."', '".$Departamento."','".$Provincia."', '".$Distrito."')");

    $html = '<thead>
                <tr>
                    <th scope="col">Nro</th>
                    <th scope="col">Código SNIP</th>
                    <th scope="col">Nombre del Proyecto de Inversión Pública</th>
                    <th scope="col">Monto de Inversión (S/.)</th>
                    <th scope="col">Estado de Proyectos</th>
                    <th scope="col">Modalidad</th>
                    <th scope="col">Periodo</th>
                    <th scope="col"></th>
                </tr>
            </thead><tbody>';
    $i = 1;
    
    if(mysqli_num_rows($resultProy) > 0) {
        while ($row = $resultProy->fetch_assoc()) {
            $html .= "
                <tr>
                    <th scope='row'>".$i."</th>
                    <td>".$row['IdProyecto']."</td>
                    <td>".$row['NombreObra']."</td>
                    <td>".number_format($row['MontoInversion'],2)."</td>
                    <td>".$row['EstadoProyecto']."</td>
                    <td>".$row['ModalidadProyecto']."</td>
                    <td>".$row['Periodo']."</td>
                    <td><button class='btn btn-info ver' data-id=".$row['IdProyecto'].">Ver</button></td>
                </tr>";
            $i++;
        }
        $html .='</tbody>';
    } else {
        $html = "<h1 class='text-center m-5'>No hay proyectos registrados</h1>";
    }

    echo $html;