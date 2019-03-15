<?php 

	include("../../clases/ClsInscripcion.php");
	header("Content-Type: text/html;charset=utf-8");


	$clsIns = new ClsInscripcion();


	//VARIABLES CONTADORAS
    $i = 0;

	$nom1 = $_POST['nom1'];
	$nom2 = $_POST['nom2'];
	$ape1 = $_POST['ape1'];
	$ape2 = $_POST['ape2'];
	$dpi  = $_POST['nidentificacion'];
	$tel  = $_POST['tel'];
	$email= $_POST['email'];
	$puesto = $_POST['puesto'];
	$registro  = $_POST['nregistro'];
	$fecha= $_POST['fecha'];
	$user = $_POST['sesion'];
	$t_r  = $_POST['total_requisitos'];
	$partido=$_POST['partido'];
	$requisitos = Array();


	
	if(!ctype_alpha($nom1))
	{
		echo 1;
		
	}else if(!ctype_alpha($nom2))
	{
		echo 1;

	}else if(!ctype_alpha($ape1))
	{
		echo 2;

	}else if(!ctype_alpha($ape2))
	{
		echo 2;

	}else if(!ctype_digit($dpi))
	{
		echo 3;

	}else if(!ctype_digit($tel))
	{
		echo 4;

	}else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		echo 5;

	}else
	{

				$requisitos[0] = 0;
				if($_POST["nregistro"] != " "){ $requisitos[0] = 1; }else{ $registro=0; }
				if(isset($_POST['dep'])){ $dep = $_POST['dep']; }else { $dep = 7; }
				if(isset($_POST['muni'])){ $muni = $_POST['muni']; }else { $muni = 5; }


				//VERIFICACION DE CHECKBOX
				$t_r = $t_r + 1;

				for($i = 1; $i <= $t_r; $i++){

					$nom = "customCheck".$i;

					if(!empty($_POST[$nom])){
						$requisitos[$i] = $_POST[$nom];
					}else{
						$requisitos[$i] = 0;
					}
				}


				


			  if($_FILES["archivo"]["error"]>0){
					echo 6;
				}else{

				if($partido != 2){


					switch ($puesto) {
						case 1: // PRESIDENTE
							
								$veri = $clsIns->veri_cant_candidatos($partido, $puesto);
								if($veri == 0){

									$answer = ingreso($nom1, $nom2, $ape1, $ape2, $email, $dpi, $fecha, $tel, $user, $puesto, $registro, 17, $requisitos, $partido, $t_r);

										if($answer == 1){
											$ss = "  FORMULARIO ENVIADO";
											$mn = $clsIns->Alerta_success($ss);
											echo $mn;

											}else{
											$ss = "  LO SIENTO, NO SE PUDO ENVIAR SU FORMULARIO";
											$mn = $clsIns->Alerta_success($ss);
											echo $mn;

											}

								}else{
										echo 9;
								}



							break;

						case 2: //DIPUTADO
							$veri = $clsIns->veri_cant_diputados($partido, $puesto, $dep, $muni);
							$v_res = $clsIns->veri_diputados($veri, $dep);

							if($v_res == 1){
								$answer = ingreso($nom1, $nom2, $ape1, $ape2, $email, $dpi, $fecha, $tel, $user, $puesto, $registro, $muni, $requisitos, $partido, $t_r);


								if($answer == 1){
								$ss = "  FORMULARIO ENVIADO";
								$mn = $clsIns->Alerta_success($ss);
								echo $mn;

								}else{
								$ss = "  LO SIENTO, NO SE PUDO ENVIAR SU FORMULARIO";
								$mn = $clsIns->Alerta_success($ss);
								echo $mn;

											}
							}else{
								echo 10;
							}

							break;


						case 3: //ALCALDE
							$veri = $clsIns->veri_municipio($partido, $puesto, $muni);
							if($veri == 0){
								$answer = ingreso($nom1, $nom2, $ape1, $ape2, $email, $dpi, $fecha, $tel, $user, $puesto, $registro, $muni, $requisitos, $partido, $t_r);
								if($answer == 1){
								$ss = "  FORMULARIO ENVIADO";
								$mn = $clsIns->Alerta_success($ss);
								echo $mn;

								}else{
								$ss = "  LO SIENTO, NO SE PUDO ENVIAR SU FORMULARIO";
								$mn = $clsIns->Alerta_success($ss);
								echo $mn;

											}
							}else{
								echo 11;
							}
							break;

						case 4: //VICEPRESIDENTE
							$veri = $clsIns->veri_cant_candidatos($partido, $puesto);
								if($veri == 0){

									$answer = ingreso($nom1, $nom2, $ape1, $ape2, $email, $dpi, $fecha, $tel, $user, $puesto, $registro, 17, $requisitos, $partido, $t_r);

										if($answer == 1){
											$ss = "  FORMULARIO ENVIADO";
											$mn = $clsIns->Alerta_success($ss);
											echo $mn;

											}else{
				
											$ss = "  LO SIENTO, NO SE PUDO ENVIAR SU FORMULARIO";
											$mn = $clsIns->Alerta_success($ss);
											echo $mn;

											}

								}else{
									echo 12;
								}
							break;
						
						default:
							# code...
							break;
					}
 


				}




					$permitidos = array("application/pdf");
					$limite_kb = 30000;

					if(in_array($_FILES["archivo"]["type"], $permitidos) && $_FILES["archivo"]["size"] <= $limite_kb * 1024){

						$tabla = "candidato"; $id = "id_candidato";
						$id_r  = $clsIns->obtener_ultimo_ingreso($tabla,$id);

						$ruta = '../../pdf/'.$id_r.'/';
						$archivo = $ruta.$_FILES["archivo"]["name"];

						if(!file_exists($ruta)){
							mkdir($ruta);
						}

						if(!file_exists($archivo)){
							$rest = @move_uploaded_file($_FILES["archivo"]["tmp_name"], $archivo);

									if($rest){
										//echo "ARCHIVO GUARDADO";
									}else{
										echo 15;
									}


						}else{
							echo 13;
						}


					}else{
						echo 14;					}

				}





	}//END ELSE

	



	function ingreso($nom1, $nom2, $ape1, $ape2, $email, $dpi, $fecha, $tel, $user, $puesto, $registro, $muni, $array, $id_part, $total){


		$cls = new ClsInscripcion();


		//INGRESO DE CANDIDATO
		$result_c = $cls->ingreso_candidato($id_part, $puesto, $nom1, $nom2, $ape1, $ape2, $email, $registro, $tel, $fecha, $dpi);


		//OBTENER ID DEL ÚLTIMO REGISTRO DE LOS CANDIDATOS
		$tabla = "candidato"; $id = "id_candidato";
		$id_r  = $cls->obtener_ultimo_ingreso($tabla,$id);


		//INGRESO A FORMULARIO DE INSCRIPCIÓN
		$resultado = $cls->ingreso_formulario_inscripcion($id_r, $muni);

		if($resultado === 1){
		$tabla = "formulario_inscripcion"; $id = "id_formulario";
		$id_f  = $cls->obtener_ultimo_ingreso($tabla, $id); 

		$estado_v = $cls->ingreso_tramite($id_f, $user);

		$req_i = $cls->ingreso_requisitos($id_f, $array, $total);

		return 1;

		}else{

			return 0;
		}



	}//END FUNCTION






?>