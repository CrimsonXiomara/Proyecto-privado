<?php 

	include("../../clases/ClsConfiguracion.php");

	$cls = new ClsConfig();

	$html_total = " ";
	$sql = "select * from requisito;";
	$result = $cls->visualizar_datos($sql);

	$json = Array();
	if($result){
		foreach ($result as $show) {
			

			$html = "<tr>";
			$html.= "<td>".$show['id_rq']." </td>";
			$html.= "<td>".$show['desc_rq']." </td>";
			$html.= "<td><button class='btn btn-danger' type='submit'>";
			$html.= "<i class='fas fa-trash-alt'></i>";
			$html.= "Borrar";
			$html.= "</button></td>";
			$html.= "</tr>";


				$html_total.= $html;




		}
	}

	echo $html_total;

	


?>