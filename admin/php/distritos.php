<?php

    require 'get.php';

    $IdProvincia = $_POST['IdProvincia'];

    $get = new get();
    $resultD = $get->getSP("get_DistritosxIdProvincia('$IdProvincia')");

    $html= "<option value='' disabled selected>Distrito</option>";
	
	while($rowPr = $resultD->fetch_assoc())
	{
		$html.= "<option value='".$rowPr['IdDistrito']."'>".$rowPr['Distrito']."</option>";
	}
	
	echo $html;

?>