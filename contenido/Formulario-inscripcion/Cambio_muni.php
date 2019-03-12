<?php

	/*
		Este proceso sirve para cambiar los municipios de acuerdo al departamento que se escoja
	*/

	include("../../clases/ClsInscripcion.php");

	$clsIns = new ClsInscripcion(); //OBJETO DE CLASE INSCRIPCION

	$id_dept = $_POST['dept'];
	$html = "<option selected>Choose...</option>";
	$html_total = " ";

	$sql = "select * from municipio ";
	$sql.= "where id_dep = $id_dept;";
	$result = $clsIns->exec_query($sql);

	if($result){
		foreach ($result as $row) {
			
			$html.= "<option value='".$row['id_municipio']."'> ".$row['nom_municipio']."</option>";
		}

		$html_total.= $html;

		

	}else{

			$html_total.= $html;
	}
	
	echo $html_total;
	
?>