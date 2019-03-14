<?php
	include("../../clases/ClsConfiguracion.php");

	$cls = new ClsConfig();


	if(isset($_POST['id']))
	{
		$id_r = $_POST['id'];

		$sql = "delete from requisito where id_rq = $id_r;";
		$result = $cls->exec_sql($sql);
			if($result){
					$mensaje = " El Elemento se elimino!";
					$html = $cls->Alerta_success($mensaje);
					echo $html;
			}else{
				$mensaje = " Lo siento, no se pudo eliminar el elemento.";
				$html = $cls->Alerta_danger($mensaje);
				echo $html;
			}
	}
	
?>