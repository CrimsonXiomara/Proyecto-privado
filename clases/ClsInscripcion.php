<?php

	include('ClsConex.php');

	/**
	 * 
	 */
	class ClsInscripcion extends ClsConex
	{
		
		function ingreso_candidato($partido, $puesto, $n1, $n2, $a1, $a2, $correo, $ciudadano,$tel, $fecha, $dpi){
			$sql = "insert into candidato(id_partido, id_puesto, p_nombre, s_nombre, p_ape, s_ape, correo, n_ciudadano, telefono, fecha_nacimiento, numero_de_identificacion)";
			$sql.= " values($partido, $puesto, '$n1', '$n2', '$a1', '$a2', '$correo', $ciudadano, $tel, '$fecha', $dpi);";
			$result = $this->exec_sql($sql);
			return $result;
		}


		function ingreso_formulario_inscripcion($candidato, $muni){
			$sql = "insert into formulario_inscripcion(id_candidato, id_municipio, fecha)";
			$sql.= " values($candidato, $muni, curdate());";
			$result = $this->exec_sql($sql);
			return $result;
		}



		function ingreso_requisitos($form, $requisitos, $total){

			$total = $total - 2;
			$nuevo = 0;
			$aux = 1;
			
			for($i = $total; $i >= 0; $i--){

		$sql = "select id_rq from requisito ORDER BY id_rq DESC LIMIT $i,1;";
		$res = $this->exec_query($sql);

		foreach ($res as $show) {
			$nuevo = $show['id_rq'];
		}


				for($x = 0; $x <= $total; $x++){
							if($requisitos[$aux] == $nuevo){

								$sql1 = "insert into form_requisito(id_formulario, id_rq) values($form, $nuevo);";
								$tt = $this->exec_sql($sql1);
								
							}//END IF
							$aux++;
						}//END FOR
		$aux = 1;

	}//END FOR

			return 0;
		}



		function ingreso_tramite($form, $user){
			$sql = "insert into tramite(id_estado, id_usuario, id_formulario, recibido, comentario)";
			$sql.= " values(5, $user, $form, 0,'');";
			$result = $this->exec_sql($sql);
			return $result;
		}

		function ingreso_prueba($nombre){
			$sql = "insert into pruebas(desc_p)";
			$sql.= " values('$nombre')";
			$result = $this->exec_sql($sql);
			return $result;
		}

		function obtener_ultimo_ingreso($tabla,$id){
			$sql = "select max($id) as id from $tabla;";
			$result = $this->exec_query($sql);
			foreach($result as $row){
				$total = $row["id"];
			}
			return $total;
		}

		function obtener_partido($id){
			$sql = "select id_partido as idp from partido";
			$sql.= " where id_usuario = $id;";
			$result = $this->exec_query($sql);

			if($result){
				foreach($result as $row){
				$respuesta = $row["idp"];
				}
				return $respuesta;
			}else{ 
				$res = "4";
				return $res; }
		}

		function veri_cant_candidatos($partido, $puesto){
			$sql = "SELECT COUNT(*) as total";
			$sql.= " from candidato";
			$sql.= " where id_partido = $partido and id_puesto = $puesto;";
			$result = $this->exec_query($sql);
			foreach($result as $row){
				$total = $row["total"];
			}
			return $total;
		}

		function veri_cant_diputados($partido, $puesto, $dept, $muni){
			$sql = "SELECT COUNT(F.id_municipio) as total ";
			$sql.= " from candidato C, formulario_inscripcion F, municipio M";
			$sql.= " where C.id_candidato = F.id_candidato and C.id_partido = $partido and C.id_puesto = $puesto and M.id_municipio = F.id_municipio and M.id_dep = $dept;";
			$result = $this->exec_query($sql);
			foreach($result as $row){
				$total = $row["total"];
				}

			return $total;
		}

		function veri_municipio($partido, $puesto, $muni){
			$sql = "SELECT COUNT(F.id_municipio) as total ";
			$sql.= " from candidato C, formulario_inscripcion F, municipio M";
			$sql.= " where C.id_candidato = F.id_candidato and C.id_partido = $partido and C.id_puesto = $puesto and M.id_municipio = F.id_municipio";
			$sql.= " and M.id_municipio = $muni;";
			$result = $this->exec_query($sql);
			foreach($result as $row){
				$total = $row["total"];
				}

			return $total;

		}

		function veri_diputados($cant, $dept){
			
				$res = 0; //Si es 1 = 'ok', si es 0= 'denegado'

				switch ($dept) {
					case 1:  //ALTAVERAPAZ	
						if($cant < 9){ $res = 1; }
						break;

					case 2:  //BAJAVERAPAZ	
						if($cant < 2){ $res = 1; }
						break;

					case 3:  //CHIMALTENANGO	
						if($cant < 5){ $res = 1; }
						break;

					case 4:  //CHIQUIMULA	
						if($cant < 3){ $res = 1; }
						break;

					case 5:  //EL PROGRESO	
						if($cant < 2){ $res = 1; }
						break;

					case 6:  //ESCUINTLA	
						if($cant < 6){ $res = 1; }
						break;

					case 7:  //GUATEMALA	
						if($cant < 9){ $res = 1; }
						break;

					case 8:  //HUEHUETENANGO
						if($cant < 10){ $res = 1; }
						break;

					case 9:  //IZABAL
						if($cant < 3){ $res = 1; }
						break;

					case 10:  //JALAPA
						if($cant < 3){ $res = 1; }
						break;

					case 11:  //JUTIAPA
						if($cant < 4){ $res = 1; }
						break;

					case 12:  //PETEN
						if($cant < 4){ $res = 1; }
						break;

					case 13:  //QUETZALTENANGO
						if($cant < 7){ $res = 1; }
						break;

					case 14:  //QUICHE
						if($cant < 8){ $res = 1; }
						break;

					case 15:  //RETALHULEU
						if($cant < 3){ $res = 1; }
						break;

					case 16:  //SACATEPEQUEZ
						if($cant < 3){ $res = 1; }
						break;

					case 17:  //SAN MARCOS
						if($cant < 9){ $res = 1; }
						break;

					case 18:  //SANTA ROSA
						if($cant < 3){ $res = 1; }
						break;

					case 19:  //SOLOLÁ
						if($cant < 3){ $res = 1; }
						break;

					case 20:  //SUCHITEPÉQUEZ
						if($cant < 5){ $res = 1; }
						break;

					case 21:  //TOTONICAPAN
						if($cant < 4){ $res = 1; }
						break;

					case 22:  //ZACAPA
						if($cant < 2){ $res = 1; }
						break;
					
					default:
						
						break;
				}

				return $res;

				}



				//PINTAR HTML


				function Alerta_success($mensaje){
					$html = "<div class='alert alert-success alert-dismissible fade show' role='alert' id='alerta_creado'>";
					$html.= "<strong>Success!</strong>".$mensaje;
					$html.= "<button type='button' class='close' data-dismiss='alert' aria-label='Close>";
					$html.= "<span aria-hidden='true'>&times;</span>";
					$html.= "</button>";
					$html.= "</div>";

					return $html;

				}

				function Alerta_danger($mensaje){
					$html = "<div class='alert alert-danger alert-dismissible fade show' role='alert' id='alerta_creado'>";
					$html.= "<strong>ERROR!</strong>".$mensaje;
					$html.= "<button type='button' class='close' data-dismiss='alert' aria-label='Close>";
					$html.= "<span aria-hidden='true'>&times;</span>";
					$html.= "</button>";
					$html.= "</div>";

					return $html;

				}


				function no_num($mensaje){
				?>
				<script>
					alert("<?php echo $mensaje; ?>");
					location.href ="../Formulario-inscripcion/html_formularioC.php";
				</script>
				<?php
				}


	
	}

	

?>
