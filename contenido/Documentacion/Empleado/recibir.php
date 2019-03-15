<?php 


	include("../../../clases/ClsverForms.php");

	$clsver = new ClsverForms();

	$id_tramite = $_GET['id'];

	//echo $id_tramite;

	$id_form = $clsver->no_formulario($id_tramite);
	$cantidad = $clsver->cant_documentos($id_form);
	$req = $clsver->cant_doc_requisitos();

	if($cantidad == $req){ $res = $clsver->update_estado_tramite($id_tramite, 1); }
	if($cantidad < $req){ $res = $clsver->update_estado_tramite($id_tramite, 2); }


	if($res){

		header('Location: html_documentacionE.php');
	}else{
		?>
		<script>
			alert("ERROR!");
			location.href ="html_documentacionE.php";
		</script>
		<?php
	}



?>