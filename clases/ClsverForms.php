<?php 

include('ClsConex.php');


	/**
	 * 
	 */
	class ClsverForms extends ClsConex
	{
		
		function cant_documentos($tramite){

			$sql = "select count(R.id_rq) tot ";
			$sql.= "from form_requisito R, formulario_inscripcion F, tramite T ";
			$sql.= "where T.id_tramite = $tramite and T.id_formulario = F.id_formulario and R.id_formulario = F.id_formulario;";
			$result = $this->exec_query($sql);
			if($result){
				foreach($result as $row){
					$total = $row['tot'];
				}

			}else {$total = 0;}


			return $total;

		}

		function cant_doc_requisitos(){
			$sql = "select count(*) as total from requisito;";
			$result = $this->exec_query($sql);
			if($result){
				foreach ($result as $show) {
					$total = $show['total'];
				}
			}else{  $total = 0; }

			return $total;
		}

		function no_formulario($tramite){
			$sql = "select id_formulario ";
			$sql.= "from tramite ";
			$sql.= "where id_tramite = $tramite";
			$result = $this->exec_query($sql);
			if($result){
			foreach($result as $row){
				$res = $row["id_formulario"];
				}

			}else {$res = 0;}

			return $res;
		}

		function obtener_candidato($form){
			$sql = "select id_candidato ";
			$sql.= "from formulario_inscripcion ";
			$sql.= "where id_formulario = $form";
			$result = $this->exec_query($sql);
			if($result){
			foreach($result as $row){
				$res = $row["id_candidato"];
				}

			}else {$res = 0;}

			return $res;
		}

		function actualizar_Datos($f, $p, $c, $pe, $l, $n, $form){
			$sql = "update formulario_inscripcion ";
			$sql.= "set foto_dpi = $f, partida = $p, constancia = $c, penal = $pe, policiaco = $l, no_ciudadano = $n ";
			$sql.= "where id_formulario = $form;";
			$result = $this->exec_sql($sql);

			return $result;

		}

		function actualizar_candidato($candi, $ciu){
			$sql = "update candidato ";
			$sql.= "set n_ciudadano = $ciu";
			$sql.= "where id_candidato = $candi;";
			$result = $this->exec_sql($sql);

			return $result;

		}


		function update_estado_tramite($tramite, $estado){
			$sql = "update tramite ";
			$sql.= "set id_estado = $estado ";
			$sql.= "where id_tramite = $tramite;";
			$result = $this->exec_sql($sql);

			return $result;
		}

		function obtener_partido_usuario($user){
			$sql = "select id_partido from partido where id_usuario = $user;";
			$result = $this->exec_query($sql);

			if($result){
			foreach($result as $row){
				$res = $row["id_partido"];
				}

			}else {$res = 0;}

			return $res;

		}

		function obtener_usuario($nom){
			$sql = "select id_user from usuario where user = '$nom';";
			$result = $this->exec_query($sql);

			if($result){
			foreach($result as $row){
				$res = $row["id_user"];
				}

			}else {$res = 0;}

			return $res;
		}


		function verificar_requisitos($rq, $array, $tam){

			$a = 0;

			for($i = 0; $i <= $tam; $i++){
				if($array[$i] == $rq){
					$a = 1;
				}
			}

			return $a;
		}//	END FUNCTION


		function ingresar_requisitos($requisito, $form){

			$sql = "insert into form_requisito(id_formulario, id_rq) ";
			$sql.= " values($form, $requisito);";
			$result = $this->exec_sql($sql);

			return $result;

		}

	

	}//END CLASE	

		/*
		
		*/

?>