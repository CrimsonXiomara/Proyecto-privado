<?php

	include("../../../clases/ClsverForms.php");
	header("Content-Type: text/html;charset=utf-8");

	  $clsver = new ClsverForms();

	$response = 0;
	$tm = $_POST["tramite"];
	$requisitos = Array();
	$requisitos[0] = 0;
	$t_r = $clsver->cant_doc_requisitos();



	if($t_r != 0){

			//VERIFICACION DE CHECKBOX
			$t_r = $t_r;

			for($i = 1; $i <= $t_r; $i++){

				$nom = "c".$i;

				if(!empty($_POST[$nom])){
					$requisitos[$i] = $_POST[$nom];
				}else{
					$requisitos[$i] = 0;
				}
			}
	}
	


	$id_form = $clsver->no_formulario($tm); // OBTENCION DE ID DEL FORMULARIO POR ACTUALIZAR
	
	$id_r = $clsver->obtener_candidato($id_form);//OBTENER ID_CANDIDATO


	//INGRESAR NUEVOS REQUISITOS

	for ($i=1; $i <= $t_r; $i++) { 
		if($requisitos[$i] != 0){
			$result = $clsver->ingresar_requisitos($requisitos[$i], $id_form);
		}
	}


	$cantidad = $clsver->cant_documentos($tm);
	if($cantidad == $t_r){ $res = $clsver->update_estado_tramite($tm, 1); }


	if($_FILES["archivo"]["error"]>0){
		echo 1;
	}else{

		$permitidos = array("application/pdf");
		$limite_kb = 30000;

		if(in_array($_FILES["archivo"]["type"], $permitidos) && $_FILES["archivo"]["size"] <= $limite_kb * 1024){


			$ruta = '../../../pdf/'.$id_r;
			

			if(file_exists($ruta)){

				$directorio = opendir($ruta);
				while ($arch = readdir($directorio))
				{
					if(!is_dir($arch))
					{
						$arch_b = $ruta."/".$arch;
					}
				}

				if(is_file($arch_b))
				{
					chmod($arch_b,0777);
					if(!unlink($arch_b))
					{
						$response = 0;
					}else{ $response = 1; }
				}

			}

			if($response == 1)
			{

				$archivo = $ruta."/".$_FILES["archivo"]["name"];
				if(!file_exists($archivo)){
				$rest = @move_uploaded_file($_FILES["archivo"]["tmp_name"], $archivo);

						if($rest){
							echo "ARCHIVO GUARDADO";
						}else{
							echo 2;
						}


			}else{
				echo 3;
			}



			}


		}else{
			echo 4;
		}

	}



	


?>