<?php

    require 'get.php';

    $IdDepartamento = $_POST['IdDepartamento'];

    $get = new get();
    $resultP = $get->getSP("get_ProvinciasxIdDepartamento('$IdDepartamento')");

    $html= "<option value='' disabled selected>Provincia</option>";
	
	while($rowP = $resultP->fetch_assoc())
	{
		$html.= "<option value='".$rowP['IdProvincia']."'>".$rowP['Provincia']."</option>";
	}
	
	echo $html;

?>