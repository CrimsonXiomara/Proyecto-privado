<?php 

include('ClsConex.php');


	/**
	 * 
	 */
	class ClsverForms extends ClsConex
	{
		
		function cant_documentos($form){

			$f = $p = $c = $pe = $l = $n = 0;

			$sql = "select foto_dpi, partida, constancia, penal, policiaco, no_ciudadano ";
			$sql.= "from formulario_inscripcion ";
			$sql.= "where id_formulario = $form;";
			$result = $this->exec_query($sql);
			if($result){
			foreach($result as $row){
				$f = $row["foto_dpi"];
				$p = $row["partida"];
				$c = $row["constancia"];
				$pe = $row["penal"];
				$l = $row["policiaco"];
				$n = $row["no_ciudadano"];
			}

			$total = $f + $p + $c + $pe + $l + $n; 
			}else {$total = $form;}


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
			$sql = "select id_candidato";
			$sql.= "from formulario_inscripcion";
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


	}	
	



		/*
		
		*/

?>