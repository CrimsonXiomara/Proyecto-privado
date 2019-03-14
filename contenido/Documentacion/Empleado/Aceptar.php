<?php 

	include("../../clases/ClsverForms.php");
	header("Content-Type: text/html;charset=utf-8");

	$clsver = new ClsverForms();

	$id_tramite = $_GET['id'];

	//echo $id_tramite;

	$id_form = $clsver->no_formulario($id_tramite);
	$cantidad = $clsver->cant_documentos($id_form);


	$res = $clsver->update_estado_tramite($id_tramite, 3); 


	if($res){

		header('Location: index_verFormularios.php');
	}else{
		?>
		<script>
			alert("ERROR!");
			location.href ="index_verFormularios.php";
		</script>
		<?php
	}



?>