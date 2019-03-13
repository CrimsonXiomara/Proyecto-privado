<?php

	include("../../../clases/ClsverForms.php");

	  $clsver = new ClsverForms();


	$tm 		 = $_POST["tramite"];
	$n_c     	 = $_POST["tciudadano"];

	//INICIALIZACION DE VARIABLES NUMERICAS
	$foto = 0;
	$constancia = 0;
	$penal = 0;
	$poli= 0;
	$partida = 0;
	$ciudadano = 0;

	if($_POST["foto"] == "true"){ $foto = 1; }
	if($_POST["partida"] == "true"){ $partida = 1; }
	if($_POST["constancia"]  == "true"){ $constancia = 1; }
	if($_POST["penal"]     == "true"){ $penal = 1; }
	if($_POST["poli"]  == "true"){ $poli = 1; }
	if($_POST["ciudadano"]    != ""){ $ciudadano = 1; }


	


	$id_form = $clsver->no_formulario($tm); // OBTENCION DE ID DEL FORMULARIO POR ACTUALIZAR
	$id_cand = $clsver->obtener_candidato($id_form); //OBTENCIO DEL ID DEL CANDIDATO POR ACTUALIZAR



	//ACTUALIZACION DE DATOS EN EL FORMULARIO


	
	$resultado = $clsver->actualizar_Datos($foto, $partida, $constancia, $penal, $poli, $ciudadano, $id_form); 


	//ACTUALIZAR NUMERO DE CIUDADANO DEL CANDIDATO, SOLO SI AUN NO LO HABIA INGRESADO CON ANTERIORIDAD
	if($ciudadano == 0){ $ans = $clsver->actualizar_candidato($id_cand, $n_c); }

	$mensaje = "SE GUARDARON LOS CAMBIOS";

	if ($resultado) {


		//PROCESO DE VERIFICACIÓN Y ACTUALIZACION DE ESTADO DEL TRAMITE

		$cantidad = $clsver->cant_documentos($id_form);

		if($cantidad == 6){
			$res = $clsver->update_estado_tramite($tm, 1);

			if($res){ $mensaje.= " Y SE ACTUALIZO EL ESTADO"; } else { $mensaje.= " Y NO SE ACTUALIZO EL ESTADO"; }
		}


			
	echo $mensaje;

	}else{ echo "LO SIENTO, HUBO UN ERROR"; }










?>