<?php 

	require_once("../../clases/ClsConfiguracion.php");
	header("Content-Type: text/html;charset=utf-8");

	$cls = new ClsConfig();

	if(isset($_POST['requisito'])){

			$rq = $_POST['requisito'];

			$sql = "insert into requisito(desc_rq) values('$rq');";
			$result = $cls->exec_sql($sql);

			if($result){
				$m = "  Requisito ingresado!";
				$html = $cls->Alerta_success($m);
					echo $html;
			}else{
				$m = " Lo siento, vuelva a intertarlo!";
				$html = $cls->Alerta_danger($m);
					echo $html;
			}
	
	}else{
		$m = "   Tiene que llenar el campo";
		$html = $cls->Alerta_danger($m);
		echo $html;
	}


	

	

?>